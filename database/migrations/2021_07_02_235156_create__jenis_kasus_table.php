<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisKasusTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_kasus', function (Blueprint $table) {
            $table->id();
            $table->string('j_kasus');
            $table->string('marker_icon');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('_jenis_kasus');
    }
}
