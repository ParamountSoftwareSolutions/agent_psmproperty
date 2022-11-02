<?php

namespace Database\Seeders;

use App\Models\BuildingExpense;
use App\Models\BuildingExpenseLabor;
use App\Models\BuildingOfficeExpense;
use App\Models\BuildingExpenseCategory;
use Illuminate\Database\Seeder;

class BuildingExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingExpenseCategory::insert([
            [
                'name' => 'Landline',
                'created_at' => '2022-05-07'
            ],
            [
                'name' => 'Furniture',
                'created_at' => '2022-05-07'
            ],
            [
                'name' => 'Power',
                'created_at' => '2022-05-07'
            ],
            [
                'name' => 'Gas',
                'created_at' => '2022-05-07'
            ],
        ]);
        BuildingExpense::insert([
            [
                'building_id' => 1,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 1,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 1,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 2,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 2,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 2,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 1,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 1,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 1,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2022-05-07',
                'created_at' => '2022-05-07'
            ],
            [
                'building_id' => 3,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 2,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 2,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 2,
                'raw_material' => 'bag',
                'qty' => '20',
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
        ]);

        BuildingExpenseLabor::insert([
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],
            [
                'building_expense_id' => mt_rand(1, 20),
                'labor' => 5,
                'cost' => 10000,
                'created_at' => '2022-05-07'
            ],

        ]);


        BuildingOfficeExpense::insert([
            [
                'building_id' => 1,
                'category' => 1,
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 1,
                'category' => 1,
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 1,
                'category' => 2,
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 1,
                'category' => 2,
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 1,
                'category' => 2,
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],
            [
                'building_id' => 1,
                'category' => 2,
                'cost' => 2000,
                'date' => '2021-05-07',
                'created_at' => '2021-05-07'
            ],

            //2
            [
                'building_id' => 2,
                'category' => 2,
                'cost' => 2000,
                'date' => '2022-03-07',
                'created_at' => '2022-03-07'
            ],
            [
                'building_id' => 2,
                'category' => 2,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 2,
                'category' => 3,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 2,
                'category' => 3,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 2,
                'category' => 3,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 2,
                'category' => 3,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],

            //3
            [
                'building_id' => 3,
                'category' => 3,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 3,
                'category' => 3,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 3,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 3,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 3,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-07-07',
                'created_at' => '2022-07-07'
            ],
            [
                'building_id' => 3,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-06-07',
                'created_at' => '2022-06-07'
            ],

            //4
            [
                'building_id' => 2,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-06-07',
                'created_at' => '2022-06-07'
            ],
            [
                'building_id' => 2,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-06-07',
                'created_at' => '2022-06-07'
            ],
            [
                'building_id' => 2,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-06-07',
                'created_at' => '2022-06-07'
            ],
            [
                'building_id' => 2,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-06-07',
                'created_at' => '2022-06-07'
            ],
            [
                'building_id' => 2,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-04-07',
                'created_at' => '2022-04-07'
            ],
            [
                'building_id' => 2,
                'category' => 4,
                'cost' => 2000,
                'date' => '2022-04-07',
                'created_at' => '2022-04-07'
            ],
        ]);
    }
}
