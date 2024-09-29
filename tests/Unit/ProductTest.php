<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public $url = "api/products";

    /**
     * A basic unit test example.
     */
    public function test_list_products(): void
    {
        $product = Product::factory(10)->create();
        $response = $this->getJson($this->url);
        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson($this->url . "/" . $product->id);
        $response->assertSuccessful();
        $response->assertStatus(200)
            ->assertJson([
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
            ]);
    }


    public function test_create(): void
    {
        Storage::fake('public');

        $data = [
            "title" => "product 1",
            "description" => "description product 1",
            "price" => 100,
            "image" => $this->faker->image('public/storage', 600, 200),
        ];
        $response = $this->postJson($this->url, $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('products', [
            "title" => "product 1",
            "description" => "description product 1",
            "price" => 100,
        ]);

    }

    public function update_create(): void
    {
        $product = Product::factory()->create();

        $data = [
            "title" => "product 1",
            "description" => "description product 1",
            "price" => 100,
            "image" => $this->faker->image('public/storage', 600, 200),
        ];
        $response = $this->putjson($this->url . "/", $product->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            "title" => "product 1",
            "description" => "description product 1",
            "price" => 100,
        ]);

    }

    public function delete_create(): void
    {
        $product = Product::factory()->create();
        $response = $this->deleteJson($this->url . '/' . $product->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);

    }
}
