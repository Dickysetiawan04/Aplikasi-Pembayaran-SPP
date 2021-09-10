<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn')->unique();
            $table->string('name');
            $table->bigInteger('no_telpon');
            $table->text('foto')->nullable()->default('foto/spp_profil.jpg');
            $table->enum('tingkat', ['X','XI','XII']);
            $table->enum('jurusan', ['MM', 'RPL', 'BC', 'TKJ', 'TEI']);
            $table->string('kelas');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('siswas');
    }
}
