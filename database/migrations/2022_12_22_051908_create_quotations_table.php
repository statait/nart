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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('auth_id');
            $table->date('quotation_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->float('sub_total',8,2);  
            $table->float('grand_total',8,2);  
            $table->string('discount_percentage');
            $table->string('discount_flat');
            $table->string('vat_percentage');
            $table->string('vat_amount');
            $table->string('total_discount');
            $table->text('details')->nullable();
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
        Schema::dropIfExists('quotations');
    }
};
