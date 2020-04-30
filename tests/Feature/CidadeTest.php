<?php

namespace Tests\Feature;

use App\Entities\Cidade;
use App\Entities\Estado;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CidadeTest extends TestCase
{
    use DatabaseTransactions;

    public function testCidadeIndex()
    {
        $estado = $this->estadoTest();
        $response = $this->get(route('estado.cidade.index', [
            'estado_id' => $estado->id
        ]));
        $response->assertSuccessful();
    }

    public function testCidadeStore()
    {
        $cidadeTest = $this->cidadeDataTest();
        $response = $this->post(route('estado.cidade.store', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testCidadeStoreDuplicatedName()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'name' => $cidadeTest->name,
        ];
        $response = $this->post(route('estado.cidade.store', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => false,
        ]);
    }

    public function testCidadeFind()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
        ];
        $response = $this->get(route('estado.cidade.show', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testCidadeFindNotExists()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest->delete();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
        ];
        $response = $this->get(route('estado.cidade.show', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'data' => null,
        ]);
    }

    public function testCidadeUpdate()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
            'name' => 'Test',
        ];
        $response = $this->put(route('estado.cidade.update', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testCidadeUpdateNotExists()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest->delete();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
            'name' => $cidadeTest->name,
        ];
        $response = $this->put(route('estado.cidade.update', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testCidadeUpdateDuplicatedName()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
            'name' => $cidadeTest->name,
        ];
        $response = $this->put(route('estado.cidade.update', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => false,
        ]);
    }

    public function testCidadeDelete()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
        ];
        $response = $this->delete(route('estado.cidade.destroy', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function testCidadeDeleteNotExists()
    {
        $cidadeTest = $this->cidadeTest();
        $cidadeTest->delete();
        $cidadeTest = [
            'estado_id' => $cidadeTest->estado_id,
            'id' => $cidadeTest->id,
        ];
        $response = $this->delete(route('estado.cidade.destroy', $cidadeTest));
        $response->assertSuccessful()->assertJson([
            'success' => true,
        ]);
    }

    public function estadoTest(){
        $estado = Estado::all()->first();

        if ($estado) {
            return $estado;
        }

        $estadoCreate = [
            'name' => 'Teste'
        ];

        return Estado::create($estadoCreate);
    }

    public function cidadeTest(){
        $cidadeTest = Cidade::all()->first();

        if ($cidadeTest) {
            return $cidadeTest;
        }

        $cidadeTest = $this->cidadeDataTest();
        return Cidade::create($cidadeTest);
    }

    public function cidadeDataTest(){
        $estadoTest = $this->estadoTest();

        return [
            'estado_id' => $estadoTest->id,
            'name' => 'Teste',
        ];
    }
}
