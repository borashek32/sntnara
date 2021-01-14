<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->integer('comment_id')
                ->references('id')
                ->on('comments')
                ->onUpdate('cascade')
                ->onDelete('some action');
            $table->integer('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('some action');
            $table->integer('user_id');
            $table->string('body', 1000);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
