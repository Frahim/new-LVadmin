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
        Schema::create('brands_tabils', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('logo')->nullable();
            $table->longText('about_brand');
            $table->longText('description');
            $table->longText('short_description');
            $table->string('bandr_image')->nullable();
            $table->string('Vedio')->nullable();
            $table->longText('other_description');
            $table->string('address');
            $table->tinyInteger('housenumber');
            $table->string('postalcode');
            $table->string('city');
            $table->smallInteger('phonenumber');
            $table->smallInteger('mobile');
            $table->string('email', 100);
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_description');        

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
        Schema::dropIfExists('brands_tabils');
    }
};
