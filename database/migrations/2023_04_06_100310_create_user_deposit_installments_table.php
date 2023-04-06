<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDepositInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_deposit_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_deposit_plan_id')->constrained();
            $table->foreignId('deposit_plan_id')->nullable()->constrained()->onDelete('set null');
            $table->string('month');
            $table->tinyInteger('status');
            $table->tinyInteger('is_paid');
            $table->decimal('amount', 16, 6);
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
        Schema::dropIfExists('user_deposit_installments');
    }
}
