<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->string('nisp')->unique();
            $table->string('nama');
            $table->string('foto');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir')->nullable();
            $table->string('no_hp');
            $table->string('fb');
            $table->string('twitter');
            $table->string('ig');
            $table->rememberToken();
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
        Schema::dropIfExists('instructures');
    }
};