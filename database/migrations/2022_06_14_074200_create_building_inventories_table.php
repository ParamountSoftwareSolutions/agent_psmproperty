<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->unsigned()->nullable()->constrained('buildings')->nullOnDelete();
            $table->foreignId('block_id')->unsigned()->nullable()->constrained('building_blocks')->nullOnDelete();
            $table->string('unit_no');
            $table->foreignId('category_id')->unsigned()->nullable()->constrained('building_categories')->nullOnDelete();
            $table->foreignId('size_id')->unsigned()->nullable()->constrained('building_sizes')->nullOnDelete();
            //$table->enum('category', ['file', 'plot', 'villa', 'farmhouse', 'house', 'office', 'flat', 'studio', 'apartment', 'school', 'penthouse', 'shop',
            // 'upper_portion', 'lower_portion']);
            $table->string('purchased_price')->nullable();
            $table->string('sold_price')->nullable();
            $table->string('down_payment')->nullable();
            $table->enum('nature', ['commercial', 'semi_commercial', 'residential']);
            $table->enum('type', ['corner', 'front_facing', 'main_boulevard', 'park_facing'])->nullable();
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
        Schema::dropIfExists('building_inventries');
    }
}
