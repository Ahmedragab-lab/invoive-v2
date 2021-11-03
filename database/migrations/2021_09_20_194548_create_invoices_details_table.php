<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Invoice')->constrained('invoices')->cascadeOnDelete();
            $table->string('invoice_number', 50);
            $table->string('Section', 999);
            $table->string('product', 50);
            $table->integer('q')->default(1);
            $table->decimal('price',8,2);
            $table->decimal('discount',8,2);
            $table->decimal('net',8,2);
            $table->integer('tax_rate');
            $table->decimal('tax_value',8,2)->nullable();
            $table->decimal('total',8,2)->nullable();
            $table->integer('status')->default(1);
            $table->string('status-val', 50)->default('Unpaid');
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);
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
        Schema::dropIfExists('invoices_details');
    }
}
