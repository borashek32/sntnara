<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{

    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->integer('review_id')
                ->references('id')
                ->on('reviews')
                ->onUpdate('cascade')
                ->onDelete('some action');
            $table->string('review_author_email', 100)
                ->references('email')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('some action');
            $table->integer('user_id');
            $table->string('body', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
