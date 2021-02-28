<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('title_en')->unique();
            $table->string('title_bn')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_bn')->unique();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable()->comment('1 = active, 2 = inactive');
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
        Schema::dropIfExists('blogs');
    }
}
