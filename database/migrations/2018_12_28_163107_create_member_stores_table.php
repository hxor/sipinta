<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_deposit_id')->unsigned();
            $table->foreign('member_deposit_id')->references('id')->on('package_deposits')->onDelete('cascade');
            $table->decimal('store', 15, 2);
            $table->date('date');
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
        Schema::dropIfExists('member_stores');
    }
}
