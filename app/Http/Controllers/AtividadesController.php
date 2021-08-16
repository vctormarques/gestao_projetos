<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Atividade;
use App\Controllers\ProjectController;

class AtividadesController extends Controller
{  
        public function index(){
            $lista = Atividade::all();
            return view('index', ['atividades' => $lista]);
        }
        
        public function store(Request $request){
            Atividade::create([
                'projeto_id' => $request->projeto_id,
                'nome' => $request->nome,
                'data_inicial' => Carbon::createFromFormat('d/m/Y', $request->dataInicial)->format('Y-m-d'),
                'data_final' => Carbon::createFromFormat('d/m/Y', $request->dataFinal)->format('Y-m-d')
            ]);
            
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade '.$request->nome.' criada com sucesso!');
        }

        public function editar(Request $request){
            $atividade = Atividade::findOrFail($request->atividade_id);

            $atividade->update([
                'nome' => $request->nome,
                'data_inicial' => Carbon::createFromFormat('d/m/Y', $request->dataInicial)->format('Y-m-d'),
                'data_final' => Carbon::createFromFormat('d/m/Y', $request->dataFinal)->format('Y-m-d')
            ]);
    
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade editada!');
        }

        public function concluir(Request $request){
            $atividade = Atividade::findOrFail($request->atividade_id);

            $atividade->update([
                'finalizada' => '1',
            ]);
    
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade concluída!');
        }

        public function excluir(Request $request){
            $atividade = Atividade::findOrFail($request->atividade_id);

            $atividade->update([
                'status' => '0',
            ]);
    
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade excluída!');
        }
    }

