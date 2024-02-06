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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->bigInteger('voucher_id')->unique();  // Unique voucher_id column
            $table->string('student_name');
            $table->string('class');
            $table->string('section');
            $table->string('sid');
            $table->string('father_name');
            $table->string('voucher_type');
            $table->string('voucher_number')->default('default_value');
            $table->string('amount');
            $table->date('expiry_date')->nullable();  // Nullable because the ExpiryDate is optional
            $table->date('date_issued')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('vouchers');
    }
};
