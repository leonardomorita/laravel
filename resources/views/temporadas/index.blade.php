@extends('layout')

@section('cabecalho')
    Temporadas da série {{ $serie->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item">
                {{ $temporada->numero_temporada }}
            </li>
        @endforeach
    </ul>
@endsection
