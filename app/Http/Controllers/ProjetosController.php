<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProjetoRepositoryInterface;
use App\Repositories\Eloquent\ProjetoRepository;
use App\Projeto;
use App\Atividade;


class ProjetosController extends Controller
{

    public $model;

    public function __construct(ProjetoRepository $model){
        $this->model = $model;
    }

    public function index(ProjetoRepositoryInterface $model){

        $projetos = $model->all();
        return view('index', ['projetos' => $projetos]);
    }

    public function show($id){

        $projeto = Projeto::findOrFail($id);
        $atividades = Atividade::where('projeto_id',$id)
                                ->where('status', '1')
                                ->get();
        return view('projeto.visualizar', ['projeto' => $projeto, 'atividades' => $atividades]);
    }

    
    public function store(Request $request){

        $this->model->store($request);
        return redirect()->action('ProjetosController@index')->with('message', 'Projeto '.$request->nome.' criado com sucesso!');

    }    

}