<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenericCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generic_certificate', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('FatherName');
            $table->string('MotherName');
            $table->string('nid');
            $table->string('passport');
            $table->string('bid');
            $table->string('birthdate');
            $table->string('presentHoldingNumber');
            $table->string('presentPostOffice');
            $table->string('presentPoliceStation');
            $table->string('permanentVillage');
            $table->string('permanentPostOffice');
            $table->string('permanentPoliceStation');
            $table->string('permanentDistrict');
            // is_verified -> boolean

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
        Schema::dropIfExists('generic_certificate');
    }
}
