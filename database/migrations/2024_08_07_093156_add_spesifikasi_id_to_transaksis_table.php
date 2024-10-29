<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpesifikasiIdToTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('spesifikasi_id')->nullable();

            // Jika Anda ingin menambahkan foreign key constraint
            $table->foreign('spesifikasi_id')->references('id')->on('spesifikasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Jika Anda menambahkan foreign key constraint di up(), hapus juga di sini
            $table->dropForeign(['spesifikasi_id']);
            $table->dropColumn('spesifikasi_id');
        });
    }
}
