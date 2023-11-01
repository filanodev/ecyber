<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryModePaiementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('country_mode_paiement', function (Blueprint $table) {
            $table->unsignedBigInteger('mode_paiement_id');
            $table->foreign('mode_paiement_id', 'mode_paiement_id_fk_9163594')->references('id')->on('mode_paiements')->onDelete('cascade');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'country_id_fk_9163594')->references('id')->on('countries')->onDelete('cascade');
        });
    }
}
