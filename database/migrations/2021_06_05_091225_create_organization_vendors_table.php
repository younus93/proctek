<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sent_by')->references('id')->on('organizations');
            $table->unsignedBigInteger('sent_to')->references('id')->on('organizations');
            /*
             * 0 - Pending
             * 1 - Accepted
             * 2 - Rejected
             * 3 - Blacklisted
             */
            $table->tinyInteger('status');
            $table->unsignedBigInteger('accepted_by')->references('id')->on('users');
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
        Schema::dropIfExists('organization_vendors');
    }
}
