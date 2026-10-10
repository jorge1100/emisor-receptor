<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_root_redirects_to_emisor(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/emisor');
    }

    public function test_emisor_and_receptor_return_successful_response(): void
    {
        $this->get('/emisor')->assertStatus(200);
        $this->get('/receptor')->assertStatus(200);
    }

    public function test_broadcast_test_endpoint_dispatches_event(): void
    {
        $response = $this->get('/broadcast-test');

        $response->assertOk()->assertJson(['ok' => true, 'channel' => 'style-channel']);
    }
}
