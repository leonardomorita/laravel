<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeDaSerie, int $qtdDeTemporadas, int $qtdDeEpisodios): Serie
    {
        DB::beginTransaction();
        // create() -> cria um novo registro dentro do banco de dados da aplicação.
        $serie = Serie::create(['nome' => $nomeDaSerie]);
        $this->criarTemporadas($qtdDeTemporadas, $serie, $qtdDeEpisodios);
        DB::commit();
        return $serie;
    }

    private function criarTemporadas(int $qtdDeTemporadas, $serie, int $qtdDeEpisodios): void
    {
        for ($i = 1; $i <= $qtdDeTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero_temporada' => $i]);

            $this->criarEpisodios($qtdDeEpisodios, $temporada);
        }
    }

    private function criarEpisodios(int $qtdDeEpisodios, $temporada): void
    {
        for ($j = 1; $j < $qtdDeEpisodios; $j++) {
            $episodio = $temporada->episodios()->create(['numero_episodio' => $j]);
        }
    }
}
