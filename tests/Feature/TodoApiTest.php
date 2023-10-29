<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

use App\Models\User;
use App\Models\Todo;

class TodoApiTest extends TestCase
{

    use RefreshDatabase;

    public function test_get_todos_not_logged_in(): void
    {
        $response = $this->getJson(route('api.todos.index'));

        $response->assertStatus(401);
    }

    public function test_get_todos_logged_in(): void
    {
        $this->login();

        $response = $this->getJson(route('api.todos.index'));

        $response->assertStatus(200);
    }

    public function test_post_todo_logged_in(): void
    {
        $this->login();

        $response = $this->postJson(route('api.todos.store'), ['title' => 'Test json post']);

        $response->assertStatus(201)
            ->assertJsonPath('title', 'Test json post');
    }

    public function test_put_todo_logged_in(): void
    {
        $this->login();
        $t = Todo::create(['title' => 'test title']);

        $response = $this->putJson(route('api.todos.update', ['todo' => $t]), ['title' => 'Test json put']);

        $response->assertStatus(200)
            ->assertJsonPath('title', 'Test json put');
    }

    public function test_delete_todo_logged_in(): void
    {
        $this->login();
        $t = Todo::create(['title' => 'test title']);

        $response = $this->deleteJson(route('api.todos.destroy', ['todo' => $t]));

        $response->assertStatus(204);
    }

    private function login()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
    }
}
