<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('memberID')->nullable();
            $table->string('formNo')->nullable();
            $table->dateTime('approvalDate')->nullable();
            $table->integer('memberCategoryID')->nullable();
            $table->unsignedBigInteger('districtID')->nullable();
            $table->unsignedBigInteger('upazillaID')->nullable();
            $table->string('companyName', 300)->nullable();
            $table->string('cellNo', 50)->nullable();
            $table->string('telephoneNo', 50)->nullable();
            $table->string('email', 300)->nullable();
            $table->string('webSite', 500)->nullable();
            $table->integer('natureofBusinessID')->nullable();
            $table->string('itemOrProduct', 300)->nullable();
            $table->string('tradeLicenseNo', 50)->nullable();
            $table->string('tradeLicenseImage', 255)->nullable();
            $table->string('tinCertificateNo', 50)->nullable();
            $table->tinyText('tinCertificateImage')->nullable();
            $table->string('locationOfBusiness', 300)->nullable();
            $table->string('headOffice', 300)->nullable();
            $table->string('salesOffice', 300)->nullable();
            $table->dateTime('dateofEstablishment')->nullable();
            $table->integer('firmStatus')->nullable();
            $table->tinyInteger('isOwnMember')->nullable();
            $table->string('ownerName', 300)->nullable();
            $table->string('ownerDesignation', 300)->nullable();
            $table->string('ownerNationalIDNo', 50)->nullable();
            $table->tinyText('ownerNationalIDImage')->nullable();
            $table->string('ownerContactNo', 50)->nullable();
            $table->tinyText('ownerImage')->nullable();
            $table->tinyInteger('isRepMember')->nullable();
            $table->string('representativeName', 300)->nullable();
            $table->string('representativeDesignation', 300)->nullable();
            $table->string('representativeNationalIDNo', 50)->nullable();
            $table->tinyText('representativeNationalIDImage')->nullable();
            $table->string('representativeContactNo', 50)->nullable();
            $table->string('representativeImage', 255)->nullable();
            $table->string('proposedMemberName1', 250)->nullable();
            $table->string('proposedCompanyName1', 500)->nullable();
            $table->string('proposedAddress1', 500)->nullable();
            $table->string('proposedMembershipNo1', 50)->nullable();
            $table->string('proposedMemberName2', 250)->nullable();
            $table->string('proposedCompanyName2', 500)->nullable();
            $table->string('proposedAddress2', 500)->nullable();
            $table->string('proposedMembershipNo2', 50)->nullable();
            $table->integer('addedBy')->nullable();
            $table->dateTime('addedDate')->nullable();
            $table->integer('lastEntryBy')->nullable();
            $table->dateTime('lastEntryDate')->nullable();
            $table->string('ownerFatherName', 250)->nullable();
            $table->string('representativeFatherName', 250)->nullable();
            $table->string('session', 50)->nullable();
            
            // Timestamps
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
        Schema::dropIfExists('memberships');
    }
}
