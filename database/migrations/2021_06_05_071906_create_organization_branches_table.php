<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id')->references('id')->on('organizations')->index();
            $table->string('branch_name');
            $table->string('location_id')->references('id')->on('locations')->index();
            /*
             * phone, address, fax, contact person name, contact person number, website, ...
             */
            $table->json('branch_meta');
            $table->unsignedBigInteger('created_by')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('organization_branches');
    }
}
