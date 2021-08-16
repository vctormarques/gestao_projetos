<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Projeto;
use App\Atividade;


class ProjetosController extends Controller
{

    public function index(){
        $projetos =  DB::table('projetos')
        ->select('projetos.id', 'projetos.nome','projetos.data_inicial','projetos.data_final', 
        (DB::raw("
        (SELECT MAX(data_final) from atividades where atividades.projeto_id = projetos.id AND status <> 0) ultima_data,
        #(select count(*) from atividades where projeto_id=projetos.id and finalizada=1 and status <> 0) finalizadas, 
        (select count(*) from atividades where projeto_id=projetos.id and status <> 0) todas_atividades,
        coalesce(((select count(*) from atividades where projeto_id=projetos.id and finalizada=1 and status <> 0) / 
        (select count(*) from atividades where projeto_id=projetos.id and status <> 0))*100,0) percentual_finalizado")))
        ->get();

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

        Projeto::create([
            'nome' => $request->nome,
            'data_inicial' => Carbon::createFromFormat('d/m/Y', $request->dataInicial)->format('Y-m-d'), 
            'data_final' => Carbon::createFromFormat('d/m/Y', $request->dataFinal)->format('Y-m-d') 
        ]);
        
        return redirect()->action('ProjetosController@index')->with('message', 'Projeto '.$request->nome.' criado com sucesso!');
    }    

}