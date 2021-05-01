@extends('layouts.app')
@section('content')
    <div class="container">
        @include('autor.__apptitulo')
        <div class="tile">
            <div class="tile-body">
                <form >
                    @csrf
                    @include('autor.__form')
                    <div class="center">
                        <a href="{{ url('/autor/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Consulta do Autor</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection