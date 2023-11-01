<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSommairesTable extends Migration
{
    public function up()
    {
        Schema::create('sommaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identifiant')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('montant', 15, 2)->nullable();
            $table->decimal('montant_payer', 15, 2)->nullable();
            $table->integer('status')->nullable();
            $table->integer('type_payement');
            $table->string('ask_payement')->nullable();
            $table->string('confirm_payement')->nullable();
            $table->longText('commentaire')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
