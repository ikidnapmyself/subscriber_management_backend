<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Field;
use App\Models\Subscriber;

class FieldTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_a_subscribers_fields()
    {
        $subscriber = Subscriber::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'state' => 'active'
        ]);
        
        $field = Field::create([
            'subscriber_id' => $subscriber->id,
            'title' => 'test',
            'type' => 'string'
        ]);

        $response = $this->json('GET','api/subscribers/'.$subscriber->id.'/fields');

        $response->assertStatus(200);
    }

    public function test_validate_if_it_returns_records_for_non_existed_subscriber()
    {
        $response = $this->json('GET','api/subscribers/21/fields');

        $response->assertStatus(404);
    }

    public function test_can_add_a_field_to_subscriber()
    {
        $subscriber = Subscriber::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'state' => 'active'
        ]);

        $response = $this->json('POST','api/subscribers/'.$subscriber->id.'/fields',[
            'title' => 'test',
            'type' => 'string'
        ]);

        $response->assertStatus(200);
    }

    public function test_validate_it_can_not_add_field_to_non_existed_subscriber()
    {
        $response = $this->json('POST','api/subscribers/2/fields',[
            'title' => 'test',
            'type' => 'string'
        ]);

        $response->assertStatus(404);
    }

    public function test_validation_works_while_adding_a_field()
    {
        $response = $this->json('POST','api/subscribers/2/fields',[
            'title' => '',
            'type' => 'string'
        ]);

        $response->assertStatus(404);
    }

    public function test_can_update_a_field_of_subscriber()
    {
        $subscriber = Subscriber::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'state' => 'active'
        ]);

        $field = Field::create([
            'subscriber_id' => $subscriber->id,
            'title' => 'test',
            'type' => 'string'
        ]);

        $response = $this->json('PUT','api/subscribers/'.$subscriber->id.'/fields/'.$field->id,[
            'title' => 'username',
            'type' => 'string'
        ]);

        $response->assertStatus(200);
    }

    public function test_returns_404_if_try_to_update_non_existed_field_or_subscriber()
    {
        $response = $this->json('PUT','api/subscribers/5/fields/2',[
            'title' => 'username',
            'type' => 'string'
        ]);

        $response->assertStatus(404);
    }

    public function test_returns_404_if_try_to_delete_non_existed_field_or_subscriber()
    {
        $response = $this->json('DELETE','api/subscribers/5/fields/2');

        $response->assertStatus(404);
    }

    public function test_can_delete_a_field()
    {
        $subscriber = Subscriber::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'state' => 'active'
        ]);

        $field = Field::create([
            'subscriber_id' => $subscriber->id,
            'title' => 'test',
            'type' => 'string'
        ]);

        $response = $this->json('DELETE','api/subscribers/'.$subscriber->id.'/fields/'.$field->id);

        $response->assertStatus(200);
    }
}
