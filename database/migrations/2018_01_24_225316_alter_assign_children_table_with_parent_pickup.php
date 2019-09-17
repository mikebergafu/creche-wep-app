<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAssignChildrenTableWithParentPickup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assign_children', function (Blueprint $table) {
            $table->timestamp('confirmed_at')->useCurrent();
            $table->timestamp('pickup_at')->useCurrent();
            $table->integer('pickup_by')->nullable();
            $table->string('pickup_status',10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_children');
    }
}
