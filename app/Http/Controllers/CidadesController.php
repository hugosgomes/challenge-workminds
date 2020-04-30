<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CidadeService;
use App\Validators\CidadeValidator;
use App\Http\Response;
use Exception;
use Illuminate\Support\Facades\Validator;

class CidadesController extends Controller
{
    protected $service;
    private $response;

    public function __construct(CidadeService $service, Response $response)
    {
        $this->service = $service;
        $this->response = $response;
    }

    public function index($estadoId)
    {
        try {
            $response = $this->service->index($estadoId);
            return $this->response->return(
                true,
                'Lista de Cidades!',
                $response
            );
        }
        catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
            );
        }
    }

    public function store(Request $request, $estadoId)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required|unique:cidades',
            ]);

            if ($validator->fails()) {
                return $this->response->return(
                    false,
                    $validator->errors()->messages(),
                    ['name' => $data['name']]
                );
            }

            $data['estado_id'] = $estadoId;
            $response = $this->service->store($data);
            return $this->response->return(
                true,
                'Cidade criada com êxito!',
                ['id' => $response->id]
            );
        }
        catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
            );
        }

    }

    public function show($estado_id, $id)
    {
        try {
            $response = $this->service->show($id);
            return $this->response->return(
                true,
                'Detalhes da Cidade',
                $response
            );
        } catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
            );
        }
    }

    public function edit($id)
    {
        return [];
    }

    public function update(Request $request, $estado_id, $id)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required|unique:cidades',
            ]);

            if ($validator->fails()) {
                return $this->response->return(
                    false,
                    $validator->errors()->messages(),
                    ['name' => $data['name']]
                );
            }

            $response = $this->service->update($data, $id);
            return $this->response->return(
                true,
                'Cidade atualizada com êxito!',
            );
        }
        catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
                $response
            );
        }
    }

    public function destroy($estado_id, $id)
    {
        try {
            $this->service->destroy($id);
            return $this->response->return(
                true,
                'Cidade deletada',
            );
        } catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
            );
        }
    }
}
