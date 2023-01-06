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
        Schema::create('elections', function (Blueprint $table) {
            $table->increments('electionID');
            $table->string('name');
            $table->integer('year');
            $table->string('category');
            $table->string('course');
            $table->longText('manifesto');
            $table->string('filePath');
            $table->boolean('approveStatus')->default(0)->change();
            $table->string('rejectReason')->nullable();
            $table->integer('vote')->nullable();
            $table->boolean('positionStatus')->nullable();
            $table->string('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elections');
    }
};
