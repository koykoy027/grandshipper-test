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
        Schema::create('users_addressess', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('type')->nullable()->comment('global_parameters id=4');
            $table->string('region')->nullable()->comment('api_philippines_regions region_code');
            $table->string('province')->nullable()->comment('api_philippines_provinces province_code');
            $table->string('city')->nullable()->comment('api_philippines_cities city_code');
            $table->string('barangay')->nullable()->comment('api_philippines_barangays barangay_code');
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_addressess');
    }
};
