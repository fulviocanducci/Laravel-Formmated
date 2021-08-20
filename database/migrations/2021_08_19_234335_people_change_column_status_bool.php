<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeopleChangeColumnStatusBool extends Migration
{
    public function up()
    {        
        Schema::table('peoples', function (Blueprint $table) {
            $table->boolean('status')->change();
        }); 
    }

    public function down()
    {
        Schema::dropIfExists('peoples');
    }
}
