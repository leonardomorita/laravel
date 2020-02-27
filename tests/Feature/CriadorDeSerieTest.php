<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeDaSerie = 'Nome de teste';
        $serie = $criadorDeSerie->criarSerie($nomeDaSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertDatabaseHas('series', ['nome' => $nomeDaSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serie->id, 'numero_temporada' => 1]);
        $this->assertDatabaseHas('episodios', ['numero_episodio' => 1]);
    }
}
