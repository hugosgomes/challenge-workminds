<?php

namespace Tests\Feature;

use App\Entities\Estado;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadoTest extends TestCase
{
    use DatabaseTransactions;

    public function testEstadoIndex()
    {
        $response = $this->get(route('estado.index'));
        $response->assertSuccessful();
    }

    public function testEstadoStore()
    {
        $estado = $this->createEstadoData();
        $response = $this->post(route('estado.store', $estado));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testEstadoStoreDuplicatedName()
    {
        $estado = $this->createEstadoFake();
        $estado = [
            'name' => $estado->name,
        ];
        $response = $this->post(route('estado.store', $estado));
        $response->assertSuccessful()->assertJson([
            'success' => false,
        ]);
    }

    public function testEstadoShow()
    {
        $estado = $this->createEstadoFake();
        $response = $this->get(route('estado.show', ['id' => $estado->id]));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testEstadoShowNotExists()
    {
        $estado = $this->createEstadoFake();
        $estado->delete();
        $response = $this->get(route('estado.show', ['id' => $estado->id]));
        $response->assertSuccessful()->assertJson([
            'data' => null,
        ]);
    }

    public function testEstadoUpdate()
    {
        $estado = $this->createEstadoFake();
        $estado = [
            'id' => $estado->id,
            'name' => 'Teste',
        ];
        $response = $this->put(route('estado.update', $estado));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testEstadoUpdateNotExists()
    {
        $estado = $this->createEstadoFake();
        $estado->delete();
        $estado = [
            'id' => $estado->id,
            'name' => 'Teste',
        ];
        $response = $this->put(route('estado.update', $estado));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testEstadoUpdateDuplicatedName()
    {
        $estado = $this->createEstadoFake();
        $estado = [
            'id' => $estado->id,
            'name' => $estado->name,
        ];
        $response = $this->put(route('estado.update', $estado));
        $response->assertSuccessful()->assertJson([
            'success' => false,
        ]);
    }

    public function testEstadoDestroy()
    {
        $estado = $this->createEstadoFake();
        $response = $this->delete(route('estado.destroy', ['id' => $estado->id]));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testEstadoDestroyNotExists()
    {
        $estado = $this->createEstadoFake();
        $estado->delete();
        $response = $this->delete(route('estado.destroy', ['id' => $estado->id]));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function createEstadoFake(){
        $estado = Estado::all()->first();

        if ($estado) {
            return $estado;
        }

        $estadoCreate = $this->createEstadoData();

        return Estado::create($estadoCreate);
    }

    public function createEstadoData(){
        return [
            'name' => 'Teste'
        ];
    }
}
