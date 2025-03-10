<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_product_successfully()
    {
        $user = User::create([
            'type' => 'admin',
            'name' => 'Teste',
            'email' => 'teste@example.com',
            'password' => bcrypt('senha123'),
        ]);

        $this->actingAs($user);

        $supplier = Supplier::create([
            'name' => 'Fornecedor Teste',
            'seller' => 'Vendedor Teste',
            'address' => 'Rua das Flores, 123',
            'cellphone' => '(11) 99999-9999',
        ]);


        $response = $this->post('/products', [
            'name' => 'Tang Morango',
            'quantity' => 10,
            'expiration_date' => now()->addDays(30)->toDateString(),
            'price' => 5.99,
            'cost' => 3.50,
            'supplier_id' => $supplier->id,
        ]);

        $response->assertRedirect(route('products.create'));
        $this->assertDatabaseHas('products', ['name' => 'Tang Morango']);
    }
}
