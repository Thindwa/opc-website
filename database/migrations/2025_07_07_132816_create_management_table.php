<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->enum('position_type', ['CS', 'DCS', 'PS', 'DPS', 'Director', 'DD']);
            $table->string('image')->nullable(); // path to image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('management');
    }
};
