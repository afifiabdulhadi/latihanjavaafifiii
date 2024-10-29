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
    Schema::table('spesifikasis', function (Blueprint $table) {
        // Check if column exists before adding
        if (!Schema::hasColumn('spesifikasis', 'transaksi_id')) {
            $table->bigInteger('transaksi_id')->unsigned()->nullable();
        }
    });
}

public function down()
{
    Schema::table('spesifikasis', function (Blueprint $table) {
        $table->dropColumn('transaksi_id');
    });
}

};
