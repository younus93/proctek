<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id')->references('id')->on('organizations');
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            /*
             * 0 - Unverified
             * 1 - Verified
             */
            $table->boolean('status')->default(0);
            /*
             * Comments by the user who has verified the organization
             */
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('organization_verifications');
    }
}
