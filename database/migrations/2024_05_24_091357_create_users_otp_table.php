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
        Schema::create('users_otp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->integer('otp_portal')->nullable()->comment('global_parameter_type id=5, 1 = email, 2=sms');
            $table->string('otp')->nullable()->comment('auto generated');
            $table->string('otp_reason')->nullable();
            $table->string('expired_at')->nullable()->comment('expiration 3 minutes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_otp');
    }
};
