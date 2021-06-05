<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_offerings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id')->references('id')->on('organizations');
            /*
             * Product or Service
             */
            $table->string('type');
            $table->unsignedBigInteger('market_category_id')->references('id')->on('market_categories');
            $table->unsignedBigInteger('market_sub_category_id')->references('id')->on('market_sub_categories');
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('featured_pic_id')->references('id')->on('files');
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
        Schema::dropIfExists('organization_offerings');
    }
}
