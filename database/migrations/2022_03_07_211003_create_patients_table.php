<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('clinic_id')->unsigned();
            $table->bigInteger('physician_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->string('height')->nullable();
            $table->string('socialRemarks')->nullable();
            $table->string('familyRemarks')->nullable();
            $table->string('weight')->nullable();
            $table->string('rightEye')->nullable();
            $table->string('leftEye')->nullable();
            $table->string('bodyTemp')->nullable();
            $table->string('pulseRate')->nullable();
            $table->string('respirationRate')->nullable();
            $table->string('bloodPressure')->nullable();
            $table->string('bloodType')->nullable();
            $table->string('tobacco')->nullable();
            $table->string('alcohol')->nullable();
            $table->string('drugs')->nullable();
            $table->string('hypertension')->nullable();
            $table->string('heartDisease')->nullable();
            $table->string('kidneyDisease')->nullable();
            $table->string('diabetese')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('prescription')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
