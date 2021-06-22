<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gstin')->unique()->index()->nullable();
            $table->string('pan')->unique()->index()->nullable();
            $table->unsignedBigInteger('logo_id')->nullable();
            /*
             * Private / Public / LLC / Partnership /
             */
            $table->string('company_registration_type')->nullable();
            /*
             * SME/MSME/
             */
            $table->string('company_size_classification')->nullable();
            $table->string('website')->nullable();
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
