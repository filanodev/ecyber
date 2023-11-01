<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRoutersTable extends Migration
{
    public function up()
    {
        Schema::table('routers', function (Blueprint $table) {
            $table->unsignedBigInteger('mode_paiement_id')->nullable();
            $table->foreign('mode_paiement_id', 'mode_paiement_fk_9171143')->references('id')->on('mode_paiements');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_9171144')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id', 'city_fk_9171145')->references('id')->on('cities');
        });
    }
}
