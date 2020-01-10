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
        $product = factory(Produto::class)->make();

        $data = $product->toArray();

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
}
