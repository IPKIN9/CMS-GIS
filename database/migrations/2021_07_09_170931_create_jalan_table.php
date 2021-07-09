<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jalan');
            $table->string('coordinat');
            $table->dateTime('created_at')->useCurrent() ;
            $table->dateTime('updated_at')->useCurrent() ;
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jalan');
    }
}
