@extends('layouts.app')
@section('content')
    <div class="container">
      @include('autor.__apptitulo')
      <div class="tile">
            <div class="tile-body">
                <form action="{{ url('/autor/update', $registro->id ) }}" method="POST">
                    @csrf
                    @include('autor.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Salvar Dados do Autor
                        </button>
                        <a href="{{ url('/autor/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar Alteração do Autor</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection