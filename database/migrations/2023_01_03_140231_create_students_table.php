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
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID');
            $table->string('studentName');
            $table->string('stdaddress');
            $table->string('studentPhone');
            $table->string('stdemail');
            $table->integer('stdyear');
            $table->string('stdsupervisor');
            $table->string('stdpsmtitle');
            $table->string('psmType');
            $table->string('image');
            $table->string('industry_status')->default('Unassigned');
            // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
