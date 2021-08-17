<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Repositories\Contracts\AtividadeRepositoryInterface;
use App\Repositories\Eloquent\AtividadeRepository;

class AtividadesController extends Controller
{  

        protected $model;

        public function __construct(AtividadeRepository $model){
            $this->model = $model;
        }

        public function store(Request $request){
            $this->model->store($request);
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade '.$request->nome.' criada com sucesso!');
        }    

        public function editar(Request $request){
            $this->model->editar($request);
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade editada!');
        }

        public function concluir(Request $request){
            $this->model->concluir($request);
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade concluída!');
        }

        public function excluir(Request $request){
            $this->model->excluir($request);
            return redirect()->route('visualizar.projeto', ['id' => $request->projeto_id])->with('message', 'Atividade excluída!');
            
        }
        
    }

