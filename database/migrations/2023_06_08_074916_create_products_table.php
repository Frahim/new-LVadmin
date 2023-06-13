<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('brand_id');
            $table->string('category')->nullable();
            $table->longText('description');          
            $table->longText('short_description');
            $table->longText('package_info');
            $table->longText('intermediate_esistance');
            $table->longText('variety'); 
            $table->integer('orginal_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_description'); 
            $table->foreign('brand_id')->references('id')->on('brands_tabils')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
