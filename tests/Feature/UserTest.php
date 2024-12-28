<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * test the user create route.
     */
    public function test_create_users_route_should_return_201(): void
    {
        $response = $this->post('/api/v1/users', ['name' => 'Teste', 'email' => 'teste@organizaai.com.br', 'password' => '12345678']);

        $response->assertStatus(201);
    }
}
