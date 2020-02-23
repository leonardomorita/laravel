<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero_episodio'];
    public $timestamps = false;

    public function temporada()
    {
        // Foi criado um relacionamento entre a tabela 'Episodio' com a tabela 'Temporada'.
            // Então, um episódio está relacionado com apenas uma determinada temporada.
        $this->belongsTo(Temporada::class);
    }
}
