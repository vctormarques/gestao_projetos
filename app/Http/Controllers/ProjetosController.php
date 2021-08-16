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
        // $lista = Projeto::all();

        $projetos =  DB::table('projetos')
        ->select('projetos.id', 'projeto.nome', 'COALESCE((select count(*) from atividades where projeto_id=P.id and finalizada=1 and status <> 0),0) AS finalizadas')
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
