<?PHP 

namespace App\Repositories\Eloquent;

use App\Atividade;
use App\Repositories\Contracts\AtividadeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AtividadeRepository extends AbstractRepository implements AtividadeRepositoryInterface
{

    protected $model = Atividade::class;

    public function index($id){
        $atividades = $this->model::where('projeto_id',$id)
            ->where('status', '1')
            ->get();
        return $atividades;
    }

    public function store($data){
        $this->model::create([
            'projeto_id' => $data['projeto_id'],
            'nome' => $data['nome'],
            'data_inicial' => Carbon::createFromFormat('d/m/Y', $data['dataInicial'])->format('Y-m-d'),
            'data_final' => Carbon::createFromFormat('d/m/Y', $data['dataFinal'])->format('Y-m-d')
        ]);
    }
    
    public function editar($data){
        $atividade = $this->model::findOrFail($data->atividade_id);
        $atividade->update([
            'nome' => $data->nome,
            'data_inicial' => Carbon::createFromFormat('d/m/Y', $data->dataInicial)->format('Y-m-d'),
            'data_final' => Carbon::createFromFormat('d/m/Y', $data->dataFinal)->format('Y-m-d')
        ]);
    }

    public function concluir($data){
        $atividade = $this->model::findOrFail($data->atividade_id);
        $atividade->update([
            'finalizada' => '1',
        ]);
    }

    public function excluir($data){
        $atividade = $this->model::findOrFail($data->atividade_id);
        $atividade->update([
            'status' => '0',
        ]);
    }

}