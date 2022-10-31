<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\BuildingAssignUser;
use App\Models\BuildingBlock;
use App\Models\BuildingCategory;
use App\Models\BuildingEmployee;
use App\Models\BuildingInventory;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Building::insert([
            [
                'code' => 'da123',
                'name' => 'Zaitoon City',
                'start_date' => '',
            ],
            [
                'code' => 'da1234',
                'name' => 'mahama City',
                'start_date' => '',
            ],
            [
                'code' => 'da1235',
                'name' => 'smart City',
                'start_date' => '',
            ],
        ]);

        BuildingCategory::insert([
            [
                'category' => 'file'
            ],
            [
                'category' => 'plot'
            ],
            [
                'category' => 'villa'
            ],
            [
                'category' => 'farmhouse'
            ],
            [
                'category' => 'house'
            ],
            [
                'category' => 'office'
            ],
            [
                'category' => 'flat'
            ],
            [
                'category' => 'studio'
            ],
            [
                'category' => 'apartment'
            ],
            [
                'category' => 'school'
            ],
            [
                'category' => 'penthouse'
            ],
            [
                'category' => 'shop'
            ],
            [
                'category' => 'upper portion'
            ],
            [
                'category' => 'lower portion'
            ],
        ]);

        BuildingBlock::insert([
            [
                'building_id' => 1,
                'name' => 'y block',
                'code' => 'f001',
            ],

            [
                'building_id' => 2,
                'name' => 'z block',
                'code' => 'f001',
            ],
        ]);

        BuildingInventory::insert([
            [
                'building_id' => 1,
                'block_id' => 1,
                'unit_no' => 'kjh',
                //'size_id' => 1,
                'category_id' => 1,
                'nature' => 'commercial',
                'type' => 'main_boulevard',
            ],
            [
                'building_id' => 2,
                'block_id' => 1,
                'unit_no' => 'kjh',
                //'size_id' => 1,
                'category_id' => 1,
                'nature' => 'commercial',
                'type' => 'main_boulevard',
            ],
            [
                'building_id' => 3,
                'block_id' => 2,
                'unit_no' => 'kjh',
                //'size_id' => 1,
                'category_id' => 1,
                'nature' => 'commercial',
                'type' => 'main_boulevard',
            ],
        ]);

        BuildingAssignUser::insert([
            //admin
            [
                'building_id' => 1,
                'user_id' => 10,
            ],
            [
                'building_id' => 2,
                'user_id' => 10,
            ],
            [
                'building_id' => 3,
                'user_id' => 10,
            ],
            //manager
            [
                'building_id' => 1,
                'user_id' => 11,
            ],
            [
                'building_id' => 2,
                'user_id' => 12,
            ],
            [
                'building_id' => 3,
                'user_id' => 12,
            ],
            //Employee 7 id
            [
                'building_id' => 1,
                'user_id' => 13,
            ],

        ]);


        BuildingEmployee::create([
            'user_id' => 13,
            'sale_manager_id' => 12,
            'cnic' => '123456784534',
            'address' => 'lahore',
            'account_no' => '1234521312',
            'salary' => 20000,
            'commission' => 5,
        ]);
    }
}
