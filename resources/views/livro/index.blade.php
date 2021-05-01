@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Livros</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Menu Principal</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
       <div class="tile">
           <div class="tile-body">
               <div id="no-more-tables">
                   <table class="table table-striped table-bordered table-hover cf ">
                        <thead class="cf">
                            <tr>
                               <th>Id</th> 
                               <th>Ano</th>
                               <th>Titulo</th>
                               <th>Data Cadastro</th>
                               <th>Autor</th>
                               <th>Editora</th>
                               <th>Ações</th>
                            </tr>    
                       </thead>
                        <tbody>
                             @foreach($registros as $registro )   
                               <tr>
                                 <td>{{ $registro->id }}</td>
                                 <td>{{ $registro->ano_edicao }}</td>
                                 <td>{{ $registro->titulo }}</td>
                                 <td>{{ date('d/m/Y', strtoTime($registro->data_cadastro)) }}</td>
                                 <td>{{ $registro->autor->nome }}</td>
                                 <td>{{ $registro->editora->nome }}</td>
                                 <td>
                                   <a class="btn btn-info btn-sm" href="{{ url('/livro/alterar', $registro->id )}} "><i class="fa fa-pencil"></i></a>
                                   <a class="btn btn-danger btn-sm" href="{{ url('/livro/excluir', $registro->id )}} "><i class="fa fa-trash"></i></a>
                                   <a class="btn btn-warning btn-sm" href="{{ url('/livro/consultar', $registro->id )}} "><i class="fa fa-address-book"></i></a>
                                 </td>
                               </tr> 
                             @endforeach
                        </tbody>
                   </table>
                   <a class="btn btn-success btn-lg" href="{{ url('/livro/incluir') }} "><i class="fa fa-plus-circle"></i></a>    

               </div>
           </div>
       </div>

 

    </div>



@endsection