<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sologon');
            $table->string('bio')->nullable();
            $table->date('dob')->nullable(); //shop started date on real life
            $table->string('phone')->nullable();
            $table->string('telephone')->nullable();
            $table->string('type')->nullable(); //service or products
            $table->string('subtype')->nullable(); 
            //what is the subtype of your shop
            $table->string('address')->nullable();
            $table->json('branch')->nullable();
            $table->string('acc_status')->nullable(); //verified
            $table->string('website')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
