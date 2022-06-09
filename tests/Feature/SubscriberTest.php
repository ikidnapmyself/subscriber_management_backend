<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Subscriber;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_subscribers()
    {
        $response = $this->json('GET','api/subscribers');

        $response->assertStatus(200);
    }

    public function test_can_add_a_new_subscriber()
    {
        $response = $this->json('POST','api/subscribers',[
            'name' => 'Amit Leuva',
            'email' => 'amitleuva1987@gmail.com',
            'state' => 'active'
        ]);

        $response->assertStatus(200);
    }

    public function test_validation_works_while_adding_subscriber()
    {
        $response = $this->json('POST','api/subscribers',[
            'name' => '',
            'email' => '',
            'state' => 'active'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            "message" => "The name field is required. (and 1 more error)",
            "errors" => [
                "name" => ["The name field is required."],
                "email" => ["The email field is required."],
            ]
        ]);
    }

    public function test_can_update_a_subscriber()
    {
        $subscriber = Subscriber::create([
            'name' => 'Amit Leuva',
            'email' => 'amitleuva1987@gmail.com',
            'state' => 'active'
        ]);

        $response = $this->json('PUT','api/subscribers/'.$subscriber->id,[
            'name' => 'Mihir Leuva',
            'email' => 'amitleuva1987@gmail.com',
            'state' => 'active'
        ]);

        $response->assertStatus(200);
    }

    public function test_validation_works_while_updating_subscriber()
    {
        $subscriber = Subscriber::create([
            'name' => 'Amit Leuva',
            'email' => 'amitleuva1987@gmail.com',
            'state' => 'active'
        ]);

        $response = $this->json('PUT','api/subscribers/'.$subscriber->id,[
            'name' => '',
            'email' => '',
            'state' => 'active'
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            "message" => "The name field is required. (and 1 more error)",
            "errors" => [
                "name" => ["The name field is required."],
                "email" => ["The email field is required."],
            ]
        ]);
    }

    public function test_can_delete_a_subscriber(){
        $subscriber = Subscriber::create([
            'name' => 'Amit Leuva',
            'email' => 'amitleuva1987@gmail.com',
            'state' => 'active'
        ]);

        $response = $this->json('DELETE','api/subscribers/'.$subscriber->id);
        
        $response->assertStatus(200);
    }
}
