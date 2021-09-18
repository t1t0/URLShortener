<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_shortlink_can_be_created()
    {
        $response = $this->postJson('/api/create', ['url' => $this->faker->url()]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'shortlink',
                'url',
                'nsfw',
                'visits'
            ]);
    }


    public function test_most_visited_url_are_returned()
    {
        $this->seed();

        $response = $this->get('/api/tops');
        $response->assertStatus(200);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                "*" => ['shortlink', 'url', 'nsfw', 'visits']
            ]);
    }


}
