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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('proposalID');
            $table->string('proposalTitle')->nullable();
            $table->date('date')->nullable();
            $table->longText('proposalDescription')->nullable();
            $table->string('proposalUrl')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->integer('phoneNumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal');
    }
};
