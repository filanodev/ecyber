<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('phonecode')->nullable();
            $table->string('currency')->nullable();
            $table->float('taux', 4, 2)->nullable();
            $table->string('timezones')->nullable();
            $table->float('latitude', 12, 8)->nullable();
            $table->float('longitude', 13, 8)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
