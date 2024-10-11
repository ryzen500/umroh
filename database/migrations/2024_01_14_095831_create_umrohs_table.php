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
         Schema::create('umrohs', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']); // Assuming L = Laki-laki, P = Perempuan
            $table->text('alamat');
            $table->string('kecamatan');   // New field
            $table->string('kelurahan');    // New field
            $table->string('calon_jamaah');
            $table->string('pembimbing');
            $table->date('keberangkatan');
            $table->string('pekerjaan');
            $table->string('no_paspor')->nullable();
            $table->date('masa_berlaku_paspor')->nullable();
            $table->string('no_visa')->nullable();
            $table->date('berlaku_sampai')->nullable();
            $table->string('paket');
            $table->string('foto')->nullable();
            $table->string('lampiran_ktp')->nullable();
            $table->string('lampiran_kk')->nullable();
            $table->string('lampiran_paspor')->nullable();
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
        Schema::dropIfExists('umrohs');
    }
};
