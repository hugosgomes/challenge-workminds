<?php

namespace App\Services;

use App\Entities\Estado;
use App\Repositories\CidadeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CidadeService{

    protected $repository;

    public function __construct(CidadeRepository $repository){
        $this->repository = $repository;
    }

    public function index($estadoId)
    {
        $estado = Estado::find($estadoId);
        if(!$estado || $estado->cidades->count() === 0) return null;
        return $estado->cidades;
    }

    public function store($data)
    {
        return $this->repository->create($data);
    }

    public function show($id)
    {
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }

    public function edit($id)
    {
        return [];
    }

    public function update($data, $id)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }

    public function destroy($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}
