<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusKriminalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus_kriminal', function (Blueprint $table) {
            $table->id();
            $table->string('kasus');
            $table->foreignId('j_kasus_id')->constrained('jenis_kasus')->onDelete('cascade');
            $table->foreignId('tkp_id')->constrained('tkp')->onDelete('cascade');
            $table->integer('jumlah');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus_kriminal');
    }
}
