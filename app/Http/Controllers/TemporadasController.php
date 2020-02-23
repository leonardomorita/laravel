<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieID)
    {
        // Buscar a série na tabela 'Serie' com o valor passado pelo parâmetro GET e retorna um objeto da classe 'Serie'.
        $serie = Serie::find($serieID);
        // Busca todas as temporadas que estão vinculadas com a série e retorna.
        $temporadas = $serie->temporadas;

        return view('temporadas.index', compact('serie','temporadas'));
    }
}
