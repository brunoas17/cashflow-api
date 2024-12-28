<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsletterSubscriberTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_api_v1_newsletter_route_should_return_201(): void
    {
        $response = $this->post('/api/v1/newsletter', ['email' => 'teste@organizaai.com.br']);

        $response->assertStatus(201);
    }
}
