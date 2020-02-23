<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        // Criando um relacionamento entre a tabela 'Serie' com a tabela 'Temporada'.
        return $this->hasMany(Temporada::class);
    }
}
