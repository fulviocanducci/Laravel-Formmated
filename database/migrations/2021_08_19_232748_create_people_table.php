<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();            
            $table->string('name', 100);
            $table->decimal('value');
            $table->date('birthday');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });       
    }

    public function down()
    {
        Schema::dropIfExists('people');
    }
}
