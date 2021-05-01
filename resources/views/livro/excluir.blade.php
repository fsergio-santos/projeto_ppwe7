@extends('layouts.app')
@section('content')
    <div class="container">
      @include('livro.__apptitulo')
      <div class="tile">
            <div class="tile-body">
                <form action="{{ url('/livro/excluir', $registro->id ) }}" method="POST">
                    @csrf
                    @include('livro.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Excluir Dados do livro
                        </button>
                        <a href="{{ url('/livro/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Exclusão do livro</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection