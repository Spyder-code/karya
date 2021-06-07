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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type')->constrained('post_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status')->constrained('post_statuses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('author');
            $table->string('title');
            $table->text('content');
            $table->text('post_excerpt')->nullable();
            $table->dateTime('schedule')->nullable();
            $table->integer('point')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
