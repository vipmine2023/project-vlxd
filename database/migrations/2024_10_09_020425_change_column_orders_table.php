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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->string('receiver_name', 255);
            $table->text('address');
            $table->text('note')->nullable(true);
            $table->smallInteger('payment_method')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('receiver_name');
            $table->dropColumn('address');
            $table->dropColumn('note');
        });
    }
};
