@extends('layouts.app')
@section('content')
    <div class="container">
        @include('usuario.__apptitulo')
        <div class="tile">
            <div class="tile-body">
                <form action="{{ url('/usuario/salvar') }}" method="POST">
                    @csrf
                    @include('usuario.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados do usuário
                        </button>
                        <a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Inclusão do usuário</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
