<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('clinic_id')->unsigned();
            $table->string('meeting');
            $table->string('reason');
            $table->boolean('status')->default(0);
            $table->bigInteger('physician_id')->unsigned();
            $table->datetime('datetime')->unique()->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                $table->foreign('clinic_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
                $table->foreign('physician_id')
                ->references('id')
                ->on('employees')
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
        Schema::dropIfExists('appointments');
    }
}
