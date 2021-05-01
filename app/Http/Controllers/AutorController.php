<?php

namespace App\Http\Controllers;
use App\models\Autor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\AutorRequest;

class AutorController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Autor $autor)
    {
        $this->repository = $autor;
        $this->request = $request;        
    }

    // retorna a pagina de listagem de autores 
    public function index(Request $request)
    {
        $registros = $this->repository->all();
        //$registros = Autor::all();
        return view('autor.index', [
            'registros' => $registros,
        ]);
    }

    // retorna a pagina para cadastrar um novo autor 
    public function new()
    {
        return view('autor.incluir');
    }

    
    // salvar o registro de um novo autor
    public function create(Request $request)
    {
        $data = $request->all();

        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
        
    

        $this->repository->create($data);
        return redirect()->route('autor.listar');
    }

    //retorna o registro de um autor para alteração dos dados. 
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('autor.alterar', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro de um autor para excluir 
    public function delete($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('autor.excluir', [
            'registro'=>$registro,
        ]);
    }

    //retorna o registro para consultar - ver o registro na tela. 
    public function view($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('autor.consultar',[
            'registro'=>$registro,
        ]);
    }

    //alterar no banco o registro do autor modificado pelo usuário - tela.  
    public function save(AutorRequest $request, $id)
    {
        $data = $request->all();   
        $registro = $this->repository->find($id);
        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
        $registro->update($data);
        return redirect()->route('autor.listar');
    }

    //excluir no banco o registro do autor
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('autor.listar');
    }

    // cancela a operação do usuário 
    public function cancel()
    {
        return redirect()->route('autor.listar');
    }









}
