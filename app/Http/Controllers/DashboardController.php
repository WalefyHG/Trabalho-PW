<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Alunos;
use App\Models\Professores;
use App\Models\Salas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $auth_user = Auth::user();
        $alunos = Alunos::all();
        $users = User::all();
        $professores = Professores::all();
        $salas = Salas::all();

        $successMessage = Session::get('success');

        return view('dashboard', [
            'auth_user' => $auth_user,
            'users' => $users,
            'alunos' => $alunos,
            'professores' => $professores,
            'salas' => $salas,
            'successMessage' => $successMessage,
        ]);
    }

}
