<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusTable extends Migration
{
    public function up()
    {
        Schema::create('kasus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kasus_id')->constrained('jenis_kasus');
            $table->foreignId('jalan_id')->constrained('jalan');
            $table->integer('jumlah_korban');
            $table->foreignId('kon_id')->constrained('kondisi_korban');
            $table->foreignId('user_id')->constrained('users');
            $table->string('ket');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kasus');
    }
}
