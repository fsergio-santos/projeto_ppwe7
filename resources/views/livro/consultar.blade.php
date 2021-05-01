@extends('layouts.app')
@section('content')
    <div class="container">
        @include('livro.__apptitulo')
        <div class="tile">
            <div class="tile-body">
                <form >
                    @csrf
                    @include('livro.__form')
                    <div class="center">
                        <a href="{{ url('/livro/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Consulta do livro</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection