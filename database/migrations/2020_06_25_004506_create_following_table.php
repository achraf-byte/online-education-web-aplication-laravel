<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Followding', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('being_Followd');
            $table->unsignedBigInteger('being_FollowdBy_id');
            
            $table->timestamps();
            $table->index('id');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Followding');
    }
}
