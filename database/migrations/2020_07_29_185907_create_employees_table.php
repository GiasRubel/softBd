<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emoplyee_no');
            $table->string('name');
            $table->unsignedInteger('designation_id')->nullable();
            $table->string('department')->nullable();
            $table->string('company')->nullable();
            $table->float('salary')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('termination_date')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
