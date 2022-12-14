<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->unsigned()->nullable()->constrained('buildings')->nullOnDelete();
            /*$table->integer('shop')->default(0);
            $table->integer('apartment')->default(0);
            $table->integer('office')->default(0);
            $table->integer('studio')->default(0);
            $table->integer('pent_house')->default(0);
            $table->integer('flat')->default(0);*/
            $table->string('developer')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('price')->nullable();
            $table->longText('description')->nullable();
            $table->text('plot_feature')->nullable();
            $table->text('business_feature')->nullable();
            $table->text('community_feature')->nullable();
            $table->text('healthcare_feature')->nullable();
            $table->text('other_facilities')->nullable();
            $table->text('property_type')->nullable();
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
        Schema::dropIfExists('building_details');
    }
}
