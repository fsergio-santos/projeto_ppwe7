@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Autor</i>
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
                               <th>Nome</th>
                               <th>E-mail</th>
                               <th>Ações</th>
                            </tr>    
                       </thead>
                        <tbody>
                             @foreach($registros as $registro )   
                               <tr>
                                 <td>{{ $registro->id }}</td>
                                 <td>{{ $registro->nome }}</td>
                                 <td>{{ $registro->email }}</td>
                                 <td>
                                   <a class="btn btn-info btn-sm" href="{{ url('autor/alterar', $registro->id )}} "><i class="fa fa-pencil"></i></a>
                                   <a class="btn btn-danger btn-sm" href="{{ url('autor/excluir', $registro->id )}} "><i class="fa fa-trash"></i></a>
                                   <a class="btn btn-warning btn-sm" href="{{ url('autor/consultar', $registro->id )}} "><i class="fa fa-address-book"></i></a>
                                 </td>
                               </tr> 
                             @endforeach
                        </tbody>
                   </table>
                   <a class="btn btn-success btn-lg" href="{{ url('autor/incluir') }} "><i class="fa fa-plus-circle"></i></a>    

               </div>
           </div>
       </div>

 

    </div>



@endsection