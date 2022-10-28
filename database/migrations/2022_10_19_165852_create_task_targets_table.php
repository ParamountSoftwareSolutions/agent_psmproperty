<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete(null);
            $table->foreignId('assign_to')->unsigned()->constrained('users')->onDelete(null);
            $table->enum('type', ['client','lead','call','meeting','conversion'])->nullable();
            $table->integer('target');
            $table->date('from');
            $table->date('to');
            $table->integer('achieved');
            $table->enum('status', ['success','pending','failed'])->default('pending');
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
        Schema::dropIfExists('task_targets');
    }
}
