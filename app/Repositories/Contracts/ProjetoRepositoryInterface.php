<?php

namespace App\Repositories\Contracts;

interface ProjetoRepositoryInterface
{
    public function all();
    
    public function store(array $data);
    
    public function show($data);
}