<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',25)->nullable();
            $table->enum('kelas',['X','XI','XII'])->nullable();
            $table->string('tempat_lahir',100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin',['Pria','Wanita'])->nullable();
            $table->string('alamat',100)->nullable();
            $table->string('no_hp',100)->nullable();
            $table->enum('status_pinjam',['bebas','tertanggung'])->nullable();
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
        Schema::dropIfExists('anggotas');
    }
}
