<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserRestController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, User $usuario)
    {
        $this->repository = $usuario;
        $this->request = $request;        
    }

    // retorna a pagina de listagem de usuarios 
    public function index(Request $request)
    {
        $registros = $this->repository->all();
        //$registros = usuario::all();
        return response()->json($registros);
    }

    // retorna a pagina para cadastrar um novo usuario 
    public function new()
    {
        return view('usuario.incluir');
    }

    
    // salvar o registro de um novo usuario
    public function create(Request $request)
    {
        $data = $request->all();

        if (empty($data['profile_pic'])){
           $data['profile_pic']='boy.png';
        }
     
        $this->repository->create($data);
        return redirect()->route('usuario.listar');
    }

    //retorna o registro de um usuario para alteração dos dados. 
    public function update($id)
    {

     
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('usuario.alterar', [
            'registro' => $registro,
           
        ]);
    }

    //retorna o registro de um usuario para excluir 
    public function delete($id)
    {
      
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('usuario.excluir', [
            'registro'=>$registro

        ]);
    }

    //retorna o registro para consultar - ver o registro na tela. 
    public function view($id)
    {
      
        $registro = $this->repository->find($id);

        if (!$registro){
            return redirect()->back();
        }

        return view('usuario.consultar',[
            'registro'=>$registro,

        ]);
    }

    //alterar no banco o registro do usuario modificado pelo usuário - tela.  
    public function save(Request $request, $id)
    {
        $data = $request->all();   
       
        $registro = $this->repository->find($id);
        $registro->update($data);
        return redirect()->route('usuario.listar');
    }

    //excluir no banco o registro do usuario
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('usuario.listar');
    }

    // cancela a operação do usuário 
    public function cancel()
    {
        return redirect()->route('usuario.listar');
    }
}
