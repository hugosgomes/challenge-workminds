<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EstadoService;
use App\Http\Response;
use Exception;
use Illuminate\Support\Facades\Validator;

class EstadosController extends Controller
{
    protected $service;
    protected $response;
    protected $validator;

    public function __construct(EstadoService $service, Response $response)
    {
        $this->service = $service;
        $this->response = $response;
    }

    public function index()
    {
        try {
            $response = $this->service->index();
            $response = $this->response->return(
                true,
                'Lista de estados!',
                $response
            );
        }
        catch (Exception $e) {
            $response = $this->response->return(
                false,
                $e->getMessage(),
            );
        }

        return $response;
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required|unique:estados',
            ]);

            if ($validator->fails()) {
                return $this->response->return(
                    false,
                    $validator->errors()->messages(),
                    ['name' => $data['name']]
                );
            }


            $response = $this->service->store($data);
            return $this->response->return(
                true,
                'Estado criado com êxito!',
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

    public function show($id)
    {
        try {
            $response = $this->service->show($id);
            return $this->response->return(
                true,
                'Detalhes do Estado',
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

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required|unique:estados',
            ]);

            if ($validator->fails()) {
                return $this->response->return(
                    false,
                    $validator->errors()->messages(),
                    ['name' => $data['name']]
                );
            }

            $this->service->update($data, $id);
            return $this->response->return(
                true,
                'Estado atualizado com êxito!',
            );
        }
        catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
            );
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->destroy($id);
            return $this->response->return(
                true,
                'Estado deletado',
            );
        } catch (Exception $e) {
            return $this->response->return(
                false,
                $e->getMessage(),
            );
        }
    }
}
