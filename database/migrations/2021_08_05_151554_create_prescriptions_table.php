<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_disease'); 
            $table->string('symptoms'); // users symtoms
            $table->integer('user_id'); // for who the medicine gets prescribed
            $table->integer('doctor_id');
            $table->string('date');
            $table->text('medicine'); // medicine1, medicine2, etc
            $table->text('use_instructions');
            $table->text('feedback');
            $table->string('signature');
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
        Schema::dropIfExists('prescriptions');
    }
}
