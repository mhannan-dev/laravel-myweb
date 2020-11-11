<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PortfolioContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('link');
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->unsignedTinyInteger('type')->comment('0=Draft, 1=Publish')->default(0);
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
        Schema::dropIfExists('portfolio_contents');
    }
}
