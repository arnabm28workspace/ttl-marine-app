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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('phone', 15)->unique()->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('profile_picture', 255)->nullable();
            
            $table->tinyInteger('is_active')->default(1); // Default is active
            $table->tinyInteger('is_email_verified')->default(0); // Default is not verified
            $table->string('email_verification_code', 6)->nullable();
            $table->dateTime('email_verification_code_expired_at', $precision = 0)->nullable();

            $table->tinyInteger('is_phone_verified')->default(0); // Default is not verified
            $table->string('phone_verification_code', 6)->nullable();
            $table->dateTime('phone_verification_code_expired_at', $precision = 0)->nullable();

            $table->string('designation', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('dob', 100)->nullable();
            $table->enum('gender', ['male', 'female','other'])->nullable()->default('male');
            $table->enum('nationality', ['indian', 'other'])->nullable()->default('indian');
            $table->enum('residency', ['visa', 'other'])->nullable()->default('visa');
            $table->string('indos_no', 100)->nullable();
            $table->string('coc_grade', 100)->nullable();
            $table->string('coc_no', 100)->nullable();
            $table->text('other_qualification')->nullable();
            $table->boolean('internal_auditor_course')->nullable()->default(false);
            $table->boolean('lead_auditor_course')->nullable()->default(false);
            $table->boolean('vict_aecs_course')->nullable()->default(false);
            $table->text('other_specialized_course')->nullable();
            $table->string('resume', 250)->nullable();
            $table->string('availability_from', 100)->nullable();
            $table->string('availability_to', 100)->nullable();
            $table->enum('job_interested_in', ['fulltime', 'parttime'])->nullable()->default('fulltime');
            $table->boolean('available_24_7_service')->nullable()->default(false);
            $table->text('additional_information')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
            $table->comment('candidates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
