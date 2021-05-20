<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Autor;
use Carbon\Carbon;
use Symfony\Component\Console\Output\ConsoleOutput;

class AutorRestController extends Controller
{
    private $repository;
    protected $request;
    private $out;

    public function __construct(Request $request, Autor $autor, ConsoleOutput $out)
    {
        
        $this->repository = $autor;
        $this->request = $request;   
        $this->out = $out;     
    }

    // retorna a pagina de listagem de autores 
    public function index(Request $request)
    {
        $this->out->writeln("Hello from Terminal");
        
        $registros = $this->repository->paginate();
  
        return response()->json($registros);
    }

    
    
    // salvar o registro de um novo autor
    public function create(Request $request)
    {
        $data = $request->all();
        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
        $this->repository->create($data);
        return response()->json(['mensagem'=>'cadastro realizado com sucesso!']);
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



}
