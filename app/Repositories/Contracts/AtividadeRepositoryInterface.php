<?php

namespace App\Repositories\Contracts;

interface AtividadeRepositoryInterface
{
    
    public function store(array $data);
    
    public function editar(array $data);
    
    public function concluir(array $data);
    
    public function excluir(array $data);

}