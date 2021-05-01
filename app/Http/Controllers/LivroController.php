<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\models\Autor;
use App\models\Editora;
use App\models\Livro;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LivroController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Livro $livro)
    {
        $this->repository = $livro;
        $this->request = $request;        
    }

    // retorna a pagina de listagem de livroes 
    public function index(Request $request)
    {
        $registros = $this->repository->all();
        //$registros = livro::all();
        return view('livro.index', [
            'registros' => $registros,
        ]);
    }

    // retorna a pagina para cadastrar um novo livro 
    public function new()
    {
        $editoras = Editora::all();
        $autores = Autor::all();

        return view('livro.incluir', [
            'editoras'=>$editoras,
            'autores'=>$autores,
        ]);
    }

    
    // salvar o registro de um novo livro
    public function create(LivroRequest $request)
    {
        $data = $request->all();
        $data['data_cadastro'] = Carbon::createFromFormat('d/m/Y',$request['data_cadastro'])->format('Y-m-d');
        $this->repository->create($data);
        return redirect()->route('livro.listar');
    }

    //retorna o registro de um livro para alteração dos dados. 
    public function update($id)
    {

        $editoras = Editora::all();
        $autores = Autor::all();
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('livro.alterar', [
            'registro' => $registro,
            'editoras'=>$editoras,
            'autores'=>$autores,
        ]);
    }

    //retorna o registro de um livro para excluir 
    public function delete($id)
    {
        $editoras = Editora::all();
        $autores = Autor::all();
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('livro.excluir', [
            'registro'=>$registro,
            'editoras'=>$editoras,
            'autores'=>$autores,
        ]);
    }

    //retorna o registro para consultar - ver o registro na tela. 
    public function view($id)
    {
        $editoras = Editora::all();
        $autores = Autor::all();
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('livro.consultar',[
            'registro'=>$registro,
            'editoras'=>$editoras,
            'autores'=>$autores,
        ]);
    }

    //alterar no banco o registro do livro modificado pelo usuário - tela.  
    public function save(LivroRequest $request, $id)
    {
        $data = $request->all();   
        $data['data_cadastro'] = Carbon::createFromFormat('d/m/Y',$request['data_cadastro'])->format('Y-m-d');
        $registro = $this->repository->find($id);
        $registro->update($data);
        return redirect()->route('livro.listar');
    }

    //excluir no banco o registro do livro
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('livro.listar');
    }

    // cancela a operação do usuário 
    public function cancel()
    {
        return redirect()->route('livro.listar');
    }

}
