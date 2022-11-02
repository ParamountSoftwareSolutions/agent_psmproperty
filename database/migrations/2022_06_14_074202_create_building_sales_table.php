<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->unsigned()->nullable()->constrained('buildings')->nullOnDelete();
            $table->foreignId('block_id')->unsigned()->nullable()->constrained('building_blocks')->nullOnDelete();
            $table->foreignId('inventory_id')->unsigned()->nullable()->constrained('building_inventories')->nullOnDelete();
            $table->foreignId('customer_id')->unsigned()->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('user_id')->unsigned()->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('payment_plan_id')->unsigned()->nullable()->constrained('building_payment_plans')->nullOnDelete();
            $table->string('registration_number')->nullable();
            $table->string('hidden_file_number')->nullable();
            $table->integer('down_payment')->nullable();
            $table->date('due_date')->nullable();
            $table->string('interested_in')->nullable();
            $table->string('source')->nullable();
            $table->enum('order_status', ['new', 'follow_up', 'discussion', 'negotiation', 'lost', 'pending', 'approved', 'rejected', 'arrange_meeting', 'meet_client',
                'mature', 'active', 'cancel', 'suspended','cancelled','transferred','token',]);
            $table->enum('order_type', ['lead', 'online_booking', 'sale']);
            $table->enum('priority', ['very_hot', 'hot', 'moderate','cold'])->nullable();
            $table->enum('purpose',['investment', 'buy'])->nullable();
            $table->string('budget')->nullable();
            $table->string('comment')->nullable();
            $table->foreignId('created_by')->unsigned()->nullable()->constrained('users')->nullOnDelete();
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
        Schema::dropIfExists('building_sales');
    }
}
