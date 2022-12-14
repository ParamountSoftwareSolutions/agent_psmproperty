<?php

namespace Database\Seeders;

use App\Models\BuildingSale;
use App\Models\BuildingSaleDetail;
use Illuminate\Database\Seeder;

class BuildingSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingSale::insert([
            [
                'building_id' => 1,
                'inventory_id' => 1,
                'customer_id' => 6,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'lead',
                'order_status' => 'new',
            ],
            [
                'building_id' => 1,
                'inventory_id' => 2,
                'customer_id' => 7,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'lead',
                'order_status' => 'new',
            ],
            [
                'building_id' => 1,
                'inventory_id' => 3,
                'customer_id' => 8,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'lead',
                'order_status' => 'new',
            ],
            [
                'building_id' => 1,
                'inventory_id' => 1,
                'customer_id' => 9,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'lead',
                'order_status' => 'new',
            ],
            [
                'building_id' => 1,
                'inventory_id' => 2,
                'customer_id' => 6,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'online_booking',
                'order_status' => 'mature',
            ],
            [
                'building_id' => 1,
                'inventory_id' => 3,
                'customer_id' => 6,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'online_booking',
                'order_status' => 'cancel',
            ],
            [
                'building_id' => 1,
                'inventory_id' => 1,
                'customer_id' => 6,
                'user_id' => 13,
                'interested_in' => 'shop',
                'down_payment' => 0,
                'due_date' => '2022-07-07',
                'order_type' => 'online_booking',
                'order_status' => 'mature',
            ],
        ]);

        /*BuildingSaleDetail::insert([
            [
                'building_sale_id' => 5,
                'token_amount' => 0,
            ],
            [
                'building_sale_id' => 6,
                'token_amount' => 0,
            ],
            [
                'building_sale_id' => 7,
                'token_amount' => 0,
            ],
        ]);*/
    }
}
