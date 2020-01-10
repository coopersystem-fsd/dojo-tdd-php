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

    public function testAtualizacaoDeProduto()
    {
        /** @var Produto $dadosAntigos */
        $dadosAntigos = factory(Produto::class)->create();
        $dadosNovos = factory(Produto::class)->make()->toArray();

        $response = $this
            ->put(
                "/api/produtos/{$dadosAntigos->id}",
                $dadosNovos
            );

        $this->assertDatabaseHas(
            'produtos',
            ['id' => $dadosAntigos->id] + $dadosNovos
        );
        $this->assertDatabaseMissing('produtos', [
            'nome' => $dadosAntigos->nome,
            'quantidade' => $dadosAntigos->quantidade,
            'valor' => $dadosAntigos->valor,
        ]);

        $response->assertStatus(204);
    }

    public function testConsultarProdutos()
    {
        $quantidadeProdutos = 100;
        $produtos = factory(Produto::class, $quantidadeProdutos)->create();

        $response = $this->get('/api/produtos');

        $response
            ->assertStatus(200)
            ->assertJsonCount($quantidadeProdutos)
            ->assertJsonStructure([
                [
                    'id',
                    'nome',
                    'quantidade',
                    'valor',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJson($produtos->toArray());
    }

    public function testDeletarProduto()
    {
        $produto = factory(Produto::class)->create();

        $response = $this->delete("/api/produtos/{$produto->getKey()}");

        $this->assertDatabaseMissing('produtos', $produto->toArray());

        $response->assertStatus(204);
    }

}
