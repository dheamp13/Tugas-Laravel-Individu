<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('meja')) {
            Schema::create('meja', function (Blueprint $table) {
                $table->id();
                $table->string('nomor_meja');
                $table->integer('kapasitas');
                $table->string('lokasi');
                $table->string('status');
                $table->string('gambar')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('meja', function (Blueprint $table) {
                if (!Schema::hasColumn('meja', 'created_at')) {
                    $table->timestamps();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meja');
    }
};
