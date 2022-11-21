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
            $table->id('id');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('contactNo');
            $table->string('gender');
            $table->string('branchAdd');
            $table->string('city');
            $table->string('barangay');
            $table->string('zip');
            $table->string('conlastName');
            $table->string('confirstName');
            $table->string('conmiddleName');
            $table->string('conConNo');
            $table->string('relationship');
            $table->string('role');
            $table->boolean('status')->default(0);
            $table->string('clinic')->nullable();
            $table->string('specialization')->nullable();
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
