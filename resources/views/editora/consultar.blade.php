@extends('layouts.app')
@section('content')
    <div class="container">
        @include('editora.__apptitulo')
        <div class="tile">
            <div class="tile-body">
                <form >
                    @csrf
                    @include('editora.__form')
                    <div class="center">
                        <a href="{{ url('/editora/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Consulta do Editora</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection