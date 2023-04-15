<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_no')->nullable()->comment('Transaction Source');
            $table->foreignId('user_id')->constrained();
            $table->string('source_type')->comment('morphic relation with multiple models');
            $table->bigInteger('source_id');
            $table->decimal('amount', 16, 6);
            $table->string('balance_type')->comment('in/out');
            $table->foreignId('wallet_type_id')->constrained();
            $table->foreignId('position_id')->nullable()->constrained();
            $table->string('date');
            $table->tinyInteger('is_approved');
            $table->string('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users', 'id');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
