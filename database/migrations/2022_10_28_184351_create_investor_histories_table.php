<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id')->unsigned()->constrained('investors')->onDelete(null);
            $table->integer('invested_amount');
            $table->foreignId('invested_in')->unsigned()->constrained('buildings')->onDelete(null);
            $table->foreignId('category_id')->unsigned()->nullable()->constrained('building_categories')->nullOnDelete()->nullOnDelete();
            $table->foreignId('size_id')->unsigned()->nullable()->constrained('building_sizes')->nullOnDelete();
            $table->integer('quantity')->nullable();
            $table->integer('profit_percentage')->nullable();
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
        Schema::dropIfExists('investor_histories');
    }
}
