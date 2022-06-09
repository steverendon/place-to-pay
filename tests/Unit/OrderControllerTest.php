<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertCount;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testItCanSaveAOrder()
    {
        $data = [
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ];

        $reponse = $this->post('/orders', $data)
            ->assertStatus(302)
            ->assertRedirect(route('pagos'));

        $this->assertDatabaseHas('orders', $data);
    }

    public function testItCanShowAOrder()
    {
        $data = [
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ];

        $order = Order::factory()->create($data);

        $this->get("/orders/{$order->id}")
            ->assertStatus(200)
            ->assertViewIs('orders.status')
            ->assertSee('Estado de la compra')
            ->assertSee('Steven Rendon');
    }

    public function testItCanShowAllOrders()
    {
        Order::factory()->create([
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ]);
        $orders = Order::factory(3)->create();

        $this->get("/all")
            ->assertStatus(200)
            ->assertSee('Ordenes de la tienda')
            ->assertSee('Steven Rendon')
            ->assertDontSee('James Rodriguez')
            ->assertViewIs('orders.all')
            ->assertViewHas('orders', Order::all());
    }

    public function testItCanShowOrderDetails()
    {
        $order = Order::factory()->create([
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ]);

        $this->get(route('pagos', ['id' => $order->id]))
            ->assertSee('Resumen de la compra')
            ->assertSee('Steven Rendon');
    }

    public function testItCanUpdateAOrderStatus()
    {
        $data = [
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ];

        $order = Order::factory()->create($data);

        $newData = [
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'PAYED',
        ];

        $order = $this->put("/orders/{$order->id}", $newData);

        $this->assertDatabaseHas('orders', $newData);
        $this->assertDatabaseMissing('orders', ['status' => 'CREATED']);
    }
}
