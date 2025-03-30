<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('doctor_name');
            $table->string('mobile_number'); // Ensure this column exists
            $table->string('email'); // Ensure this column exists
            $table->string('address'); // Ensure this column exists
            $table->date('date');
            $table->string('status');
            $table->string('report')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
