<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('admin_id')->unsigned();
            $table->bigInteger('subscription_id')->unsigned();
            $table->string('name');
            $table->string('subDuration')->default(0);
            $table->string('proof_image');
            $table->string('blockNo');
            $table->string('city');
            $table->string('barangay');
            $table->string('zip');
            $table->string('contactNo');
            $table->string('editStatus')->default(1);
            $table->string('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('admin_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('posts');
    }
}
