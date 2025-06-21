<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('asset_reports', function (Blueprint $table) {
            if (!Schema::hasColumn('asset_reports', 'lokasi')) {
                $table->string('lokasi')->after('kategori');
            }
        });
    }

    public function down()
    {
        Schema::table('asset_reports', function (Blueprint $table) {
            $table->dropColumn('lokasi');
        });
    }
};