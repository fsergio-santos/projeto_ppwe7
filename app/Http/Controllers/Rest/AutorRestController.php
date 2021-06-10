<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
//use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;
use App\models\Autor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
    // paginaAtual 0....n
    // pageSize    5,10,15,20,25.... 
    // dir/sort    classificar -> asc, desc 
    // props "campos da tabela" -> id, nome, email.
    // search      nome, email, cpf, cgc ......             

    public function index(Request $request)
    {
        //$this->out->writeln("Hello from Terminal");
        
        //$registros = $this->repository->paginate();
        
        //DB::table('autors')->paginate();

        $paginaAtual = $request->get('paginaAtual') ? $request->get('paginaAtual') : 1;
        $pageSize    = $request->get('pageSize') ? $request->get('pageSize') : 5;
        $dir         = $request->get('dir') ? $request->get('dir') : "asc";
        $props       = $request->get('props') ? $request->get('props') : "id";
        $search      = $request->get('search') ? $request->get('search') : "";

        if (empty($search)){
            $query = DB::table('autors')->select('*')->orderBy( $props, $dir);   
        } else {
            $query = DB::table('autors')->where('nome', 'LIKE','%'.$search.'%')
                                        //->orWhere('email','LIKE','%'.$search.'%')
                                        //->orWhere('cidade','LIKE','%'.$search.'%')
                                        ->orderBy( $props, $dir); 
        } 
        
        $total = $query->count();
   
        $registros = $query->offset(($paginaAtual-1) * $pageSize)->limit($pageSize)->get();

        return response()->json([
            'data'        =>$registros,
            'paginaAtual' =>$paginaAtual-1,
            'pageSize'    =>$pageSize,
            'paginaFim'   =>ceil($total/$pageSize),
            'total'       =>$total,
        ]);
    }

    
    
    // salvar o registro de um novo autor
    public function create(Request $request)
    {
        $data = $request->all();
        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
        $this->repository->create($data);
        return response()->json(['mensagem'=>'Cadastro realizado com sucesso!']);
    }

    //retorna o registro de um autor para alteração dos dados. 
    public function update($id)
    {
        $registro = $this->repository->find($id);

        if (!$registro){
            return response()->json(['mensagem' => "Registro não localizado!"]);
        }
        return  response()->json(['autor' => $registro]);
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
    public function save(Request $request, $id)
    {

        $data = $request->all();  
        $registro = $this->repository->find($id);
      
        if (!$registro){
            return response()->json(['mensagem' => "Registro não localizado!"]);
        }

        //$data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
        $registro->update($data);
        return response()->json(['mensagem' => "Alteração realizada com sucesso!"] );
    }

    //excluir no banco o registro do autor
    public function excluir($id)
    {
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('autor.listar');
    }



}
