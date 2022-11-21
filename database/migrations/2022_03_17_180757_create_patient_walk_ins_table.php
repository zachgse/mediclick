<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientWalkInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_walk_ins', function (Blueprint $table) {
            $table->id('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('contactNo');
            $table->string('email');
            $table->bigInteger('clinic_id')->unsigned();
            $table->bigInteger('physician_id')->unsigned();
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
        Schema::dropIfExists('patient_walk_ins');
    }
}
