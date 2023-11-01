<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModePaiementsTable extends Migration
{
    public function up()
    {
        Schema::create('mode_paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slog')->nullable();
            $table->string('libelle');
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->boolean('api_key')->default(0)->nullable();
            $table->boolean('site_token')->default(0)->nullable();
            $table->boolean('notify_url')->default(0)->nullable();
            $table->boolean('return_url')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
