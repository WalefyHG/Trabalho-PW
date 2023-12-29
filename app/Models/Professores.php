<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'cpf',
        'rg',
        'telefone',
        'cep',
        'endereco',
        'cidade',
        'estado',
        'formacao',
        'materia',
        'instituicao',
        'situacao',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
