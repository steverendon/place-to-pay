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

        $reponse = $this->post(route('order.store'), $data)
            ->assertStatus(302)
            ->assertRedirect(route('order.show'));

        $this->assertDatabaseHas('orders', $data);
    }

    public function testItCanShowOrderDetails()
    {
        $order = Order::factory()->create([
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ]);

        $this->get(route( 'order.show', ['id' => $order->id] ))
            ->assertViewIs('orders.detail')
            ->assertSee('Resumen de la compra')
            ->assertSee('Steven Rendon')
            ->assertSee('steven.rendon@hotmail.com')
            ->assertSee('3187773322');
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

        $data['status'] = 'PAYED';

        $order = $this->put(route('order.update', ['id' => $order->id]), $data);

        $this->assertDatabaseHas('orders', ['status' => 'PAYED']);
        $this->assertDatabaseMissing('orders', ['status' => 'CREATED']);
    }
}
