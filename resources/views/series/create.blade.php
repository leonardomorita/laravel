@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection



@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="col col-2">
            <label for="quantidade_temporadas">Qtd temporadas</label>
            <input type="number" class="form-control" name="quantidade_temporadas" id="quantidade_temporadas">
        </div>

        <div class="col col-2">
            <label for="quantidade_episodios">Qtd ep. temporadas</label>
            <input type="number" class="form-control" name="quantidade_episodios" id="quantidade_episodios">
        </div>
    </div>

    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection
