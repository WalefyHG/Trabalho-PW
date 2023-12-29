<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role',
        'cpf',
        'rg',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'curso',
        'instituicao',
        'periodo',
        'turno',
        'matricula',
        'situacao',
    ];

    protected $table = 'alunos';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
