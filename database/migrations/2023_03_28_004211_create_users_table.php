<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('refer_by')->nullable()->constrained('users', 'id');
            $table->bigInteger('refer_code')->unique()->nullable();
            $table->bigInteger('register_by')->nullable();
            $table->string('payment_image')->nullable();
            $table->string('transaction_id')->nullable();
            $table->tinyInteger('type')->default(1)->comment('1=admin, 2=app user');
            $table->tinyInteger('approval')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
