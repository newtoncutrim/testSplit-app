<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserAuthApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa a autenticação do usuário.
     */
    public function test_user_login(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $loginData = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/api/auth/login', $loginData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token',
                ],
            ]);

        $this->assertAuthenticated(); // Verifica se o usuário está autenticado
    }

    /**
     * Testa falha na autenticação do usuário.
     */
    public function test_user_login_failure(): void
{
    $invalidLoginData = [
        'email' => 'nonexistent@example.com',
        'password' => 'invalidpassword',
    ];

    $response = $this->post('/api/auth/login', $invalidLoginData);

    $response->assertStatus(401) // Alterado para o código HTTP 401 Unauthorized
        ->assertJson([
            'data' => 'usuario nao outorizado',
        ]);

    $this->assertGuest(); // Verifica se o usuário não está autenticado
}
}
