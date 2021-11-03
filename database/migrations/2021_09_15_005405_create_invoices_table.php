<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number',20);
            $table->date('invoice_date');
            $table->foreignId('sections_id')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->integer('q')->default(1);
            $table->decimal('price',8,2);
            $table->decimal('discount',8,2);
            $table->decimal('net',8,2);
            $table->integer('tax_rate');
            $table->decimal('tax_value',8,2)->nullable();
            $table->decimal('total',8,2)->nullable();
            $table->integer('status')->default(1);
            $table->string('status-val', 50)->default('Unpaid');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
