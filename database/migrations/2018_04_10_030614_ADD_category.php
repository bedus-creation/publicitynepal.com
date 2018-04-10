<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ADDCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("categories",function(Blueprint $table){
            $table->tinyInteger("order")->nullable();
            $table->tinyInteger("display")->default(1); 
            // Default Show
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("categories",function(Blueprint $table){
            $table->dropColumn(['order','display']);
        });
    }
}
