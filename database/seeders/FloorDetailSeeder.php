<?php

namespace Database\Seeders;

use App\Models\BuildingPaymentPlan;
use App\Models\FloorDetail;
use App\Models\FloorDetailFile;
use App\Models\PaymentPlan;
use Illuminate\Database\Seeder;

class FloorDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$payment_plan = BuildingPaymentPlan::create([
            'property_admin_id' => 10,
            'name' => 'Default',
            'total_month_installment' => 48,
            'total_price' => 2100000,
            'booking_price' => 200000,
            //'form_submission' => 50000,
            'per_month_installment' => 15000,
            'half_year_installment' => 60000,
            'balloting_price' => 400000,
            'possession_price' => 300000,
        ]);*/

        FloorDetail::insert([
            [
                'building_id' => 1,
                'block' => 'faadf',
                'unit_no' => 'unit_no',
                'size' => '2',
                'category' => 1,
                'nature' => 'commercial',
                'type' => 'corner',
                'status' => 'available',
            ],
            [
                'building_id' => 1,
                'block' => 'faadf',
                'unit_no' => 'unit_no',
                'size' => '2',
                'category' => 1,
                'nature' => 'commercial',
                'type' => 'corner',
                'status' => 'available',
            ],
            [
                'building_id' => 2,
                'block' => 'faadf',
                'unit_no' => 'unit_no',
                'size' => '2',
                'category' => 1,
                'nature' => 'commercial',
                'type' => 'corner',
                'status' => 'available',
            ],
            [
                'building_id' => 2,
                'block' => 'faadf',
                'unit_no' => 'unit_no',
                'size' => '2',
                'category' => 1,
                'nature' => 'commercial',
                'type' => 'corner',
                'status' => 'available',
            ],
            [
                'building_id' => 3,
                'block' => 'faadf',
                'unit_no' => 'unit_no',
                'size' => '2',
                'category' => 1,
                'nature' => 'commercial',
                'type' => 'corner',
                'status' => 'available',
            ],
            [
                'building_id' => 3,
                'block' => 'faadf',
                'unit_no' => 'unit_no',
                'size' => '2',
                'category' => 1,
                'nature' => 'commercial',
                'type' => 'corner',
                'status' => 'available',
            ],
        ]);
    }
}
