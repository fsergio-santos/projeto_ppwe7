@extends('layouts.app')
@section('content')
    <div class="container">
      @include('editora.__apptitulo')
      <div class="tile">
            <div class="tile-body">
                <form action="{{ url('/editora/update', $registro->id ) }}" method="POST">
                    @csrf
                    @include('editora.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados do Editora
                        </button>
                        <a href="{{ url('/editora/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Alteração do Editora</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection