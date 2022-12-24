<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('user_type',User::types)->default('driver');
            $table->string('email')->unique()->nullable();
            $table->string('identity_number')->unique()->nullable();
            $table->boolean('card')->default(false);
            $table->date('card_expiry')->nullable();
            $table->boolean('delegation')->default(false);
            $table->date('delegation_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->float('salary')->nullable();
            $table->string('license_number')->unique()->nullable();
            $table->date('license_expiry')->nullable();
            $table->string('password')->nullable();
            $table->string('firebase_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
