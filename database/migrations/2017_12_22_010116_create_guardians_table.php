<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guardian_id');
            $table->string('user_id');
            $table->string('guardian_name');
            $table->string('guardian_home_phone');
            $table->string('guardian_work_phone');
            $table->string('guardian_cell');
            $table->string('guardian_home_address');
            $table->string('guardian_occupation');
            $table->string('guardian_employer');
            $table->string('guardian_business_address');
            $table->string('guardian_work_hours');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
