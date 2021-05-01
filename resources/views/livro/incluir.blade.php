@extends('layouts.app')
@section('content')
    <div class="container">
        @include('livro.__apptitulo')
        <div class="tile">
            <div class="tile-body">
                <form action="{{ url('/livro/salvar') }}" method="POST">
                    @csrf
                    @include('livro.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados do Livro
                        </button>
                        <a href="{{ url('/livro/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Inclusão do livro</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
