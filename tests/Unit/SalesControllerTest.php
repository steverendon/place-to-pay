<?php

namespace Tests\Unit;

use App\Models\Order;
use Tests\TestCase;

class SalesControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testItCanShowAllSales()
    {
        Order::factory()->create([
            'customer_name' => 'Steven Rendon',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'PAYED',
        ]);

        Order::factory()->create([
            'customer_name' => 'James Rodriguez',
            'customer_email' => 'steven.rendon@hotmail.com',
            'customer_mobile' => '3187773322',
            'status' => 'CREATED',
        ]);

        $orders = Order::factory(3)->create();

        $this->get(route('sale'))
            ->assertStatus(200)
            ->assertSee('Ordenes de la tienda')
            ->assertSee('Steven Rendon')
            ->assertDontSee('James Rodriguez')
            ->assertViewIs('sales.index');
    }
}
