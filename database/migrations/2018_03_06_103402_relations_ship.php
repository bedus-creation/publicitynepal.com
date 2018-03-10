<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationsShip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("relations",function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger("posts_id");
            $table->foreign("posts_id")
            ->references("id")
            ->on("posts")
            ->onDelete("cascade");
            $table->unsignedInteger("category_id");
            $table->foreign("category_id")
            ->references("id")
            ->on("categories")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("relations");
    }
}
