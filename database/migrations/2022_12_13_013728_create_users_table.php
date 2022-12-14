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
            $table->string('identification_Number')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('license_number')->unique()->nullable();
            $table->date('License_expiry')->nullable();
            $table->foreignId('truck_id')->nullable()->constrained('trucks')->nullOnDelete();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
