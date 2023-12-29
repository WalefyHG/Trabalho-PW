<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'capacidade',
        'tipo',
        'descricao',
        'professor_id',
        'situacao',
        'data',
    ];

    public function professor()
    {
        return $this->belongsTo(Professores::class);
    }
}
