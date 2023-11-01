<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToConfirmePaiementsTable extends Migration
{
    public function up()
    {
        Schema::table('confirme_paiements', function (Blueprint $table) {
            $table->unsignedBigInteger('mode_paiement_id')->nullable();
            $table->foreign('mode_paiement_id', 'mode_paiement_fk_9163910')->references('id')->on('mode_paiements');
        });
    }
}
