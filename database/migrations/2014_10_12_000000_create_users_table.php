<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            // Patient information structure
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // Doctor information structure
            $table->integer('role_id'); 
            $table->string('address')->nullable(); // only for doctor
            $table->string('phone_number')->nullable(); // only for doctor
            $table->string('department')->nullable(); // only for doctor
            $table->string('image')->nullable(); // image for doctor so patient can see doctor
            $table->string('education')->nullable();
            $table->text('description')->nullable();
            // Admin information structure
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
