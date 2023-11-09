<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use WithFaker;


    public function testIndex()
    {
        // Simule uma solicitação GET para a rota de índice da API
        $response = $this->get('/api/products');

        // Verifique se a resposta tem um código de status HTTP 200 (OK)
        $response->assertStatus(200);

        // Verifique se a resposta contém os dados esperados
        $response->assertJsonStructure([
            'pagina_atual',
            'total_paginas',
            'total_registros',
            'registros_por_pagina',
            'registros',
        ]);
    }

    public function testStore()
    {
        // Dados de exemplo para criar um produto
        $productData = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'amount' => $this->faker->randomNumber(2),
            'user_id' => 1, // O ID do usuário deve ser ajustado conforme necessário
        ];

        // Simule uma solicitação POST para a rota de armazenamento da API
        $response = $this->post('/api/products', $productData);

        // Verifique se a resposta tem um código de status HTTP 201 (Created)
        $response->assertStatus(201);

        // Verifique se a resposta contém os dados esperados do produto
        $response->assertJsonStructure([
            'message',
            'data',
        ]);
    }

    public function testShow()
    {
        // ID de um produto existente no banco de dados
        $productId = 5; // Ajuste conforme necessário

        // Simule uma solicitação GET para a rota de exibição da API com o ID do produto
        $response = $this->get("/api/products/$productId");

        // Verifique se a resposta tem um código de status HTTP 200 (OK)
        $response->assertStatus(200);

        // Verifique se a resposta contém os dados esperados do produto
        $response->assertJsonStructure([
            'data',
        ]);
    }

    public function testUpdate()
    {
        // ID de um produto existente no banco de dados
        $productId = 5; // Ajuste conforme necessário

        // Dados de exemplo para atualizar o produto
        $productData = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'amount' => $this->faker->randomNumber(2),
            'user_id' => 1, // O ID do usuário deve ser ajustado conforme necessário
        ];

        // Simule uma solicitação PUT para a rota de atualização da API com o ID do produto
        $response = $this->put("/api/products/$productId", $productData);

        // Verifique se a resposta tem um código de status HTTP 200 (OK)
        $response->assertStatus(200);

        // Verifique se a resposta contém os dados atualizados do produto
        $response->assertJsonStructure([
            'message',
            'data',
        ]);
    }

    public function testDestroy()
    {
        // ID de um produto existente no banco de dados
        $productId = 5; // Ajuste conforme necessário

        // Simule uma solicitação DELETE para a rota de exclusão da API com o ID do produto
        $response = $this->delete("/api/products/$productId");

        // Verifique se a resposta tem um código de status HTTP 200 (OK)
        $response->assertStatus(200);

        // Verifique se a resposta contém a mensagem de exclusão bem-sucedida
        $response->assertJsonStructure([
            'message',
        ]);
    }
}
