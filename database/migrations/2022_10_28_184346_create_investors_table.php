<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete(null);
            $table->foreignId('invest_to')->unsigned()->constrained('users')->onDelete(null);
            $table->integer('total_amount');
            $table->integer('profit')->nullable();
            $table->integer('loss')->nullable();
            $table->integer('investor_profit_amount')->nullable();
            $table->integer('profit_percentage')->nullable();
            $table->integer('remaining_amount')->nullable();
            $table->integer('return_amount')->nullable();
            $table->date('return_date')->nullable();
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
        Schema::dropIfExists('investors');
    }
}
