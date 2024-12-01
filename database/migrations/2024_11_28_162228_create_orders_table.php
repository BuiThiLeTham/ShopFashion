<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id(); // Khóa chính, tự động tăng
            $table->foreignId('user_id')->constrained(); // Khóa ngoại tham chiếu đến bảng 'users'
            $table->decimal('total', 10, 2); // Cột kiểu số thập phân cho tổng tiền
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending'); // Enum cho trạng thái thanh toán
            $table->string('payment_transaction_id')->nullable(); // ID giao dịch thanh toán
            $table->timestamps(); // Các trường created_at và updated_at
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
