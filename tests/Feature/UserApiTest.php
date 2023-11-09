<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa a listagem de usuários.
     */
    public function test_user_index(): void
    {
        /* User::factory()->count(5)->create(); */

        $response = $this->get('/api/users');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'email',
                ],
            ]);
    }

    /**
     * Testa a criação de um usuário.
     */
    public function test_user_creation(): void
{
    $userData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'Password1!', // Atende aos requisitos: 1 letra maiúscula, 1 caractere especial, 8 dígitos
    ];

    $response = $this->post('/api/users', $userData);

    $response->assertStatus(201)
        ->assertJson([
            'message' => 'User created successfully',
            'data' => [
                'id' => $response['data']['id'],
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ],
        ]);

    $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    $this->assertTrue(Hash::check('Password1!', User::find($response['data']['id'])->password));
}


    /**
     * Testa a exibição de um usuário específico.
     */
    public function test_user_show(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->get("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
    }

    /**
     * Testa a atualização de um usuário.
     */
    public function test_user_update(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        $updatedData = ['name' => 'Updated Name'];

        $response = $this->put("/api/users/{$user->id}", $updatedData);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'User updated successfully',
                'data' => [
                    'id' => $user->id,
                    'name' => 'Updated Name',
                    'email' => $user->email,
                ],
            ]);

        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Updated Name']);
    }

    /**
     * Testa a exclusão de um usuário.
     */
    public function test_user_destroy(): void
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->delete("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'User deleted successfully']);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
