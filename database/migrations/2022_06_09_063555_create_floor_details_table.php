<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->unsigned()->nullable()->constrained('buildings')->nullOnDelete();
            //$table->foreignId('floor_id')->unsigned()->nullable()->constrained('floors')->onDelete(null);
            //$table->foreignId('payment_plan_id')->unsigned()->nullable()->constrained('building_payment_plans')->onDelete(null);
            $table->string('block');
            $table->string('unit_no');
            $table->string('size');
            $table->enum('category', ['file', 'plot', 'villa', 'farmhouse', 'house', 'office', 'flat', 'studio', 'apartment', 'school', 'penthouse', 'shop', 'upper_portion', 'lower_portion']);
            $table->enum('nature', ['commercial', 'semi_commercial', 'residential']);
            $table->enum('type', ['corner', 'front_facing', 'main_boulevard', 'park_facing']);
            $table->enum('status', ['available', 'hold', 'sold','token','canceled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floor_details');
    }
}
