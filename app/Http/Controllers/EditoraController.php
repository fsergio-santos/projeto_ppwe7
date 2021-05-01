<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Editora;
use App\Http\Requests\EditoraRequest;

class EditoraController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Editora $editora)
    {
        $this->repository = $editora;
        $this->request = $request;        
    }

    // retorna a pagina de listagem de editoraes 
    public function index(Request $request)
    {
        $registros = $this->repository->all();
        //$registros = editora::all();
        return view('editora.index', [
            'registros' => $registros,
        ]);
    }

    // retorna a pagina para cadastrar um novo editora 
    public function new()
    {
        return view('editora.incluir');
    }

    
    // salvar o registro de um novo editora
    public function create(EditoraRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('editora.listar');
    }

    //retorna o registro de um editora para alteração dos dados. 
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('editora.alterar', [
            'registro' => $registro,
        ]);
    }

    //retorna o registro de um editora para excluir 
    public function delete($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('editora.excluir', [
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

        return view('editora.consultar',[
            'registro'=>$registro,
        ]);
    }

    //alterar no banco o registro do editora modificado pelo usuário - tela.  
    public function save(EditoraRequest $request, $id)
    {
        $data = $request->all();   
        $registro = $this->repository->find($id);
        $registro->update($data);
        return redirect()->route('editora.listar');
    }

    //excluir no banco o registro do editora
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('editora.listar');
    }

    // cancela a operação do usuário 
    public function cancel()
    {
        return redirect()->route('editora.listar');
    }


}
