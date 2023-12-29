<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alunos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    public function cadastrarAluno(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
            'matricula' => 'required',
            'curso' => 'required',
            'periodo' => 'required',
            'telefone' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'instituicao' => 'required',
            'turno' => 'required',
            'situacao' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    

        $aluno = Alunos::create([
            'user_id' => $user->id,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'curso' => $request->curso,
            'instituicao' => $request->instituicao,
            'periodo' => $request->periodo,
            'turno' => $request->turno,
            'matricula' => $request->matricula,
            'role' => $request->role,
            'situacao' => $request->situacao,
        ]);
        Session::flash('success', 'Usuário cadastrado com sucesso!');
        return redirect()->route('dashboard');
    }

    public function atualizarAluno(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'matricula' => 'required',
            'curso' => 'required',
            'periodo' => 'required',
            'telefone' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'instituicao' => 'required',
            'turno' => 'required',
            'situacao' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->withInput());
        }

        $aluno = Alunos::with('user')->find($id);

        if(!$aluno){
            abort(404, 'Aluno não encontrado');
        }

        $aluno->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $aluno->update([
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'curso' => $request->curso,
            'instituicao' => $request->instituicao,
            'periodo' => $request->periodo,
            'turno' => $request->turno,
            'matricula' => $request->matricula,
            'situacao' => $request->situacao,
        ]);

        return redirect()->route('dashboard')->with('sucess', 'Aluno atualizado com sucesso');
    }


    public function deletarAluno($id){
        $aluno = Alunos::with('user')->find($id);

        if(!$aluno){
            abort(404, 'Aluno não encontrado');
        }

        User::find($aluno->user_id)->delete();
        $aluno->delete();

        return redirect()->route('dashboard')->with('sucess', 'Aluno deletado com sucesso');
    }
}
