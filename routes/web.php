<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SalaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.admin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.admin');

Route::get('/admin/cadastro', [AdminController::class, 'showCadastroForm'])->name('admin.cadastro');
Route::post('/admin/cadastrar', [AdminController::class, 'cadastrar'])->name('admin.cadastrar');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/aluno/cadastro', [AlunoController::class, 'cadastrarAluno'])->name('aluno.cadastro');
    Route::post('/professor/cadastro', [ProfessorController::class, 'cadastrarProfessor'])->name('professores.cadastro');
    Route::post('/salas/cadastro', [SalaController::class, 'cadastrarSala'])->name('salas.cadastro');
    Route::post('/salas/alugar', [SalaController::class, 'alugarSalas'])->name('salas.alugar');
    Route::post('/salas/desalugar', [SalaController::class, 'devolverSalas'])->name('salas.desalugar');
    Route::put('/professor/atualizar{id}', [ProfessorController::class, 'atualizarProfessor'])->name('professores.atualizar');
    Route::delete('/professor/deletar{id}', [ProfessorController::class, 'deletarProfessor'])->name('professores.deletar');
    Route::put('/aluno/atualizar{id}', [AlunoController::class, 'atualizarAluno'])->name('aluno.atualizar');
    Route::delete('/aluno/deletar{id}', [AlunoController::class, 'deletarAluno'])->name('aluno.deletar');
    Route::put('/sala/atualizar{id}', [SalaController::class, 'editarSala'])->name('sala.atualizar');
    Route::delete('/sala/deletar{id}', [SalaController::class, 'excluirSala'])->name('sala.deletar');
});