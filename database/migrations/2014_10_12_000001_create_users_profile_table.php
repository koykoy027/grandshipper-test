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
        Schema::create('users_profile', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('users');
            // personal information
            $table->string('suffix')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('birthday')->nullable();
            $table->integer('gender')->nullable()->comment('global_parameters id');
            $table->integer('civil_status')->nullable()->comment('global_parameters id');
            $table->integer('religion')->nullable()->comment('global_parameters id');
            $table->longText('job_description')->nullable();
            
            // account information
            $table->string('role')->nullable();
            $table->boolean('is_admin');
            $table->boolean('is_required_to_change_password');
            $table->boolean('is_otp_enabled')->default(false);
            $table->integer('otp_portal')->nullable()->comment('global_parameter id=5, 1 = email, 2 = sms');
            $table->boolean('is_active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('created_by')->nullable()->comment('users id');
            $table->integer('updated_by')->nullable()->comment('users id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_profile');
    }
};
