<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("posts",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->timestamps();
            $table->unsignedInteger("user_id");
            $table->text("title")->collation("utf8mb4_unicode_520_ci");
            $table->text("slug")->collation("utf8mb4_unicode_520_ci");
            $table->longText("content")->collation("utf8mb4_unicode_520_ci");
            $table->tinyInteger("status")->default(1);
            $table->string("category")->nullable();
            $table->tinyInteger("post_type")->default(1);
            $table->integer("views")->default(0);
            $table->string("featured_photo")->nullable();
            $table->collation="utf8mb4_unicode_520_ci";
            $table->charset="utf8mb4";
            $table->foreign("user_id")
            ->references("id")
            ->on("users")
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
        Schema::drop("posts");
    }
}