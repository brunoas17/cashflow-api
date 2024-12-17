<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatusTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_v1_status_route_should_return_200(): void
    {
        $response = $this->get('/api/v1/status');

        $response->assertStatus(200);
    }
}
