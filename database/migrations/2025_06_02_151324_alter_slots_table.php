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
         Schema::table('slots', function (Blueprint $table) {
            
            $table->dropColumn('is_booked');
            $table->string('is_booked');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('slots', function (Blueprint $table) {
            
            $table->boolean('is_booked');
            $table->dropColumn('is_booked');
            
        });
    }
};
