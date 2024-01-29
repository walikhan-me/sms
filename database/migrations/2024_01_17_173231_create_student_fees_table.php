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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->string('feetype');
            $table->string('tutionfee'); // Assuming fees can be in decimal format
            $table->string('labfee');
            $table->string('examinationfee');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('session');
            $table->string('fee_id_');
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
        Schema::dropIfExists('student_fees');
    }
};
