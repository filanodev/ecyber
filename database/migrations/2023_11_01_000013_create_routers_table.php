<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutersTable extends Migration
{
    public function up()
    {
        Schema::create('routers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->longText('contact')->nullable();
            $table->string('dns_name');
            $table->decimal('solde', 15, 2)->nullable();
            $table->string('active_sms');
            $table->string('type_serveur');
            $table->longText('payement_token')->nullable();
            $table->string('map')->nullable();
            $table->string('active_pub_local')->nullable();
            $table->string('active_bup_global')->nullable();
            $table->string('active_vpn')->nullable();
            $table->string('code_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
