<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentWalkInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_walk_ins', function (Blueprint $table) {
            $table->id('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('contactNo');
            $table->string('meeting');
            $table->string('reason');
            $table->string('email');
            $table->boolean('status')->default(0);
            $table->bigInteger('physician_id')->unsigned();
            $table->bigInteger('clinic_id')->unsigned();
            $table->datetime('datetime')->unique();
            $table->timestamps();
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
        Schema::dropIfExists('appointment_walk_ins');
    }
}
