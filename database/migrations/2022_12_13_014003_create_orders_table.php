<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Order;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number')->unique()->nullable();
            $table->float('price');
            $table->string('weight');
            $table->integer('quantity');
            $table->string('product_type');
            $table->integer('moves_number');
            $table->string('lat_start');
            $table->string('lng_start');
            $table->string('address_start');
            $table->string('lat_end');
            $table->string('lng_end');
            $table->string('address_end');
            $table->float('order_pocket')->nullable();
            $table->string('status')->default('pending');
            $table->string('status_ar')->default('قيد الانتظار');
            $table->foreignId('driver_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();
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
        Schema::dropIfExists('orders');
    }
}
