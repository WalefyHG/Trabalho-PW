<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salas;
class SalaController extends Controller
{
    public function cadastrarSala(Request $request){
        $request->validate([
            'nome' => 'required',
            'capacidade' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'data' => 'required',
        ]);

        $sala = Salas::create([
            'nome' => $request->nome,
            'capacidade' => $request->capacidade,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'data' => $request->data,
        ]);

        return redirect()->route('dashboard')->with('success', 'Sala cadastrada com sucesso!');
    }

    public function alugarSalas(Request $request){
        $request->validate([
            'sala_id' => 'required',
            'professor_id' => 'required',
        ]);

        $sala = Salas::find($request->sala_id);
        $sala->professor_id = $request->professor_id;
        $sala->situacao = 'Alugada';
        
        $sala->save();

        return redirect()->route('dashboard')->with('success', 'Sala alugada com sucesso!');
    }

    public function devolverSalas(Request $request){
        $request->validate([
            'sala_id' => 'required',
        ]);

        $sala = Salas::find($request->sala_id);
        $sala->professor_id = null;
        $sala->situacao = 'Livre';
        
        $sala->save();

        return redirect()->route('dashboard')->with('success', 'Sala devolvida com sucesso!');
    }

    public function editarSala(Request $request, $id){
        $request->validate([
            'nome' => 'required',
            'capacidade' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'data' => 'required',
        ]);

        $sala = Salas::find($id);
        $sala->nome = $request->nome;
        $sala->capacidade = $request->capacidade;
        $sala->tipo = $request->tipo;
        $sala->descricao = $request->descricao;
        $sala->data = $request->data;
        
        $sala->save();

        return redirect()->route('dashboard')->with('success', 'Sala editada com sucesso!');
    }

    public function excluirSala(Request $request, $id){
        $sala = Salas::find($id);
        $sala->delete();

        return redirect()->route('dashboard')->with('success', 'Sala excluída com sucesso!');
    }
}
