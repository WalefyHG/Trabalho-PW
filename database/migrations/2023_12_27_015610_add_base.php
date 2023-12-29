<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Alunos', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('rg');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('curso');
            $table->string('instituicao');
            $table->string('periodo');
            $table->string('turno');
            $table->string('matricula');
            $table->string('situacao');
            $table->string('role')->default('aluno');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });


        Schema::create('Professores', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('rg');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('formacao');
            $table->string('materia');
            $table->string('instituicao');
            $table->string('situacao');
            $table->string('role')->default('professor');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('Salas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->string('nome');
            $table->string('capacidade');
            $table->string('tipo');
            $table->string('descricao');
            $table->string('situacao')->default("Livre");
            $table->date('data');
            $table->timestamps();
            $table->foreign('professor_id')->references('id')->on('Professores')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
