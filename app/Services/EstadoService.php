<?php

namespace App\Services;

use App\Repositories\EstadoRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EstadoService{

    protected $repository;

    public function __construct(EstadoRepository $repository){
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
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
