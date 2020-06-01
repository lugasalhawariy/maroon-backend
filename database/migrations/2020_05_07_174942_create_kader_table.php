<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('nama');
            $table->string('nim');
            $table->string('prodi');
            $table->date('ttl');
            $table->longText('alamat_asal');
            $table->longText('alamat_jogja');
            $table->softDeletes();
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
        Schema::dropIfExists('kader');
    }
}
