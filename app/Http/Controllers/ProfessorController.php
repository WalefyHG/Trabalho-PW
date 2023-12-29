<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Professores;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProfessorController extends Controller
{
    public function cadastrarProfessor(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'formacao' => 'required',
            'instituicao' => 'required',
            'situacao' => 'required',
            'materia' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    

        $professor = Professores::create([
            'user_id' => $user->id,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'formacao' => $request->formacao,
            'instituicao' => $request->instituicao,
            'materia' => $request->materia,
            'role' => $request->role,
            'situacao' => $request->situacao,
        ]);
        Session::flash('success', 'Professor cadastrado com sucesso!');
        return redirect()->route('dashboard');
    }


    public function atualizarProfessor(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'cpf' => 'required',
        'rg' => 'required',
        'telefone' => 'required',
        'endereco' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'cep' => 'required',
        'formacao' => 'required',
        'instituicao' => 'required',
        'situacao' => 'required',
        'materia' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }


    $professor = Professores::with('user')->find($id);

    if (!$professor) {
        abort(404, 'Professor não encontrado');
    }

    $professor->user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

 
    $professor->update([
        'cpf' => $request->cpf,
        'rg' => $request->rg,
        'telefone' => $request->telefone,
        'endereco' => $request->endereco,
        'cidade' => $request->cidade,
        'estado' => $request->estado,
        'cep' => $request->cep,
        'formacao' => $request->formacao,
        'instituicao' => $request->instituicao,
        'situacao' => $request->situacao,
        'materia' => $request->materia,
    ]);


    return redirect()->route('dashboard')->with('success', 'Professor atualizado com sucesso!');
}


    public function deletarProfessor($id){
        $professor = Professores::with('user')->find($id);
        if (!$professor) {

            abort(404, 'Professor não encontrado');
        }

        User::find($professor->user_id)->delete();
        $professor->delete();
        return redirect()->route('dashboard')->with('success', 'Professor deletado com sucesso!');
    }


}