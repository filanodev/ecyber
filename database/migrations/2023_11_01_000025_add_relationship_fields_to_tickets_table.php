<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_9171511')->references('id')->on('users');
            $table->unsignedBigInteger('router_id')->nullable();
            $table->foreign('router_id', 'router_fk_9171512')->references('id')->on('routers');
        });
    }
}
