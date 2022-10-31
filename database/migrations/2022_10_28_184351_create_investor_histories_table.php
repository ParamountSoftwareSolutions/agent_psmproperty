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
            $table->string('invested_in');
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
