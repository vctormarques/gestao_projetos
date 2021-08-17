<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProjetoRepositoryInterface;
use App\Repositories\Eloquent\ProjetoRepository;
use App\Repositories\Eloquent\AtividadeRepository;


class ProjetosController extends Controller
{

    private $model;

    public function __construct(ProjetoRepository $model){
        $this->model = $model;
        $this->atividade = new AtividadeRepository();
    }

    public function index(ProjetoRepositoryInterface $model){
        $projetos = $model->all();
        return view('index', ['projetos' => $projetos]);
    }
       
    public function store(Request $request){
        $this->model->store($request);
        return redirect()->action('ProjetosController@index')->with('message', 'Projeto '.$request->nome.' criado com sucesso!');
    }  

    public function show($id, AtividadeRepository $atividade){
        $projetos = $this->model->show($id);
        $atividades = $this->atividade->index($id);
        return view('projeto.visualizar', ['projeto' => $projetos, 'atividades' => $atividades]);

    }  

}