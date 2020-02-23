<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{

    public function removerSerie(int $serieId): string
    {
        $nomeDaSerie = '';
        DB::transaction(function () use ($serieId, &$nomeDaSerie) {
            $serie = Serie::find($serieId);
            $nomeDaSerie = $serie->nome;
            // Para cada um dos registros, ou seja, temporadas, será executado uma função dentro da função each()
            $this->removerTemporadas($serie);
            $serie->delete();
        });

        return $nomeDaSerie;
    }

    private function removerTemporadas(Serie $serie): void
    {
        $serie->temporadas()->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
