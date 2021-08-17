<?PHP 

namespace App\Repositories\Eloquent;

use App\Projeto;
use App\Repositories\Contracts\ProjetoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProjetoRepository extends AbstractRepository implements ProjetoRepositoryInterface
{

    protected $model = Projeto::class;

    public function all(){
        $projetos =  DB::table('projetos')
        ->select('projetos.id', 'projetos.nome','projetos.data_inicial','projetos.data_final', 
        (DB::raw("
        (SELECT MAX(data_final) from atividades where atividades.projeto_id = projetos.id AND status <> 0) ultima_data,
        #(select count(*) from atividades where projeto_id=projetos.id and finalizada=1 and status <> 0) finalizadas, 
        (select count(*) from atividades where projeto_id=projetos.id and status <> 0) todas_atividades,
        coalesce(((select count(*) from atividades where projeto_id=projetos.id and finalizada=1 and status <> 0) / 
        (select count(*) from atividades where projeto_id=projetos.id and status <> 0))*100,0) percentual_finalizado")))
        ->get();
        return $projetos;
    }

    public function store($data){
        $this->model::create([
            'nome' => $data['nome'],
            'data_inicial' => Carbon::createFromFormat('d/m/Y', $data['dataInicial'])->format('Y-m-d'), 
            'data_final' => Carbon::createFromFormat('d/m/Y', $data['dataFinal'])->format('Y-m-d') 
        ]);
    }

    public function show($data){
        $projetos = $this->model::findOrFail($data);
        return $projetos;
    }

}