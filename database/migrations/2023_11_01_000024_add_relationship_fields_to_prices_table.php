<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPricesTable extends Migration
{
    public function up()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->unsignedBigInteger('router_id')->nullable();
            $table->foreign('router_id', 'router_fk_9171339')->references('id')->on('routers');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_9171343')->references('id')->on('users');
        });
    }
}
