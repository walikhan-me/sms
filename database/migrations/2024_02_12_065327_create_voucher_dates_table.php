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
        Schema::create('voucher_dates', function (Blueprint $table) {
            $table->id();
            $table->string('single_student_voucher_id');
            $table->string('bulk_student_voucher_id');
            $table->date('charge_date');
            $table->date('posting_date');
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
        Schema::dropIfExists('voucher_dates');
    }
};
