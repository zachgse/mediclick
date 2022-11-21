<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('clinic_id')->unsigned()->nullable();
            $table->bigInteger('subscription_id')->unsigned();
            $table->string('paymentProof')->nullable();
            $table->boolean('status')->default(0);
            $table->string('accountNumber')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        $table->foreign('clinic_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');
            $table->foreign('subscription_id')
            ->references('id')
            ->on('subscriptions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
