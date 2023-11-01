<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmePaiementsTable extends Migration
{
    public function up()
    {
        Schema::create('confirme_paiements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payement_ref')->nullable();
            $table->string('identifiant')->nullable();
            $table->decimal('montant', 15, 2)->nullable();
            $table->string('compte_payement')->nullable();
            $table->string('datetime')->nullable();
            $table->integer('status')->nullable();
            $table->longText('commentaire')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
