<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable();
            $table->integer('block')->nullable();
            $table->integer('lot')->nullable();
            $table->string('street')->nullable();
            $table->string('subdivision')->nullable();
            $table->integer('building_no')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->integer('zipcode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_addresses');
    }
}
