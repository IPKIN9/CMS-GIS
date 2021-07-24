<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebDescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('_web_description', function (Blueprint $table) {
            $table->id();
            $table->string('web_description');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('description');
    }
}
