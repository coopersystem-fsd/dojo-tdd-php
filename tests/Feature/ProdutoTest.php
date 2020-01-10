<?php

namespace Tests\Feature;

use App\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function testCriacaoDeProduto()
    {
        $data = [
            'nome' => 'Garrafa',
            'quantidade' => 10,
            'valor' => 10.00
        ];

        $response = $this->post('/api/produtos', $data);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'nome',
                'quantidade',
                'valor'
            ]);

        $this->assertDatabaseHas('produtos', $data);
    }

    public function testSoma()
    {
        $res = Produto::soma(1, 2);

        $this->assertEquals(3, $res);
    }
}
