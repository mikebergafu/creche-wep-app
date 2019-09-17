<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('child_fullname');
            $table->string('child_id',20);
            $table->string('address');
            $table->string('dob');
            $table->string('nickname');

            $table->integer('guardian1_id')->unsigned()->index();
            $table->integer('guardian2_id')->unsigned()->index();

            $table->string('pickup_name');
            $table->string('pickup_phone');
            $table->string('pickup_relationship');

            $table->string('primary_emergency_name')->nullable();
            $table->string('primary_emergency_homephone')->nullable();
            $table->string('primary_emergency_workphone')->nullable();
            $table->string('primary_emergency_relationship')->nullable();
            $table->string('primary_emergency_address')->nullable();

            $table->string('secondary_emergency_name')->nullable();
            $table->string('secondary_emergency_homephone')->nullable();
            $table->string('secondary_emergency_workphone')->nullable();
            $table->string('secondary_emergency_relationship')->nullable();
            $table->string('secondary_emergency_address')->nullable();

            $table->text('special_instruction')->nullable();

            $table->string('child_physician')->nullable();
            $table->string('child_physician_phone')->nullable();
            $table->string('preffered_hospital')->nullable();
            $table->string('preffered_hospital_phone')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('regular_medications')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('medicine_allergic')->nullable();
            $table->string('food_allergies')->nullable();
            $table->string('other_allergies')->nullable();
            $table->string('last_immunization')->nullable();
            $table->string('special_health')->nullable();

            $table->string('has_had')->nullable();
            $table->string('has_had_other')->nullable();

            $table->string('suffer_from')->nullable();
            $table->string('suffer_from_other')->nullable();

            $table->text('child_welfare_clinic')->nullable();
            $table->text('other_provision')->nullable();
            $table->text('outstanding_concerns')->nullable();
            $table->string('after_school_care')->nullable();
            $table->string('after_school_care_how_many')->nullable();
            $table->string('after_school_care_ages')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->foreign('guardian1_id')->references('id')->on('guardians');
            $table->foreign('guardian2_id')->references('id')->on('guardians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
