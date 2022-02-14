<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ais', function (Blueprint $table) {
            $table->integer('mmsi')->primary();
            $table->string('imo')->nullable();
            $table->string('name')->nullable();
            $table->decimal('latitude',8,5)->default(0);
            $table->decimal('longitude',8,5)->default(0);
            $table->integer('navstat')->default(0);
            $table->string('location')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('ais');
    }
}
