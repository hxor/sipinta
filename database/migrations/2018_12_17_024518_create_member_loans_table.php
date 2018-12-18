<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice');
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members');
            $table->integer('loan_id')->unsigned();
            $table->foreign('loan_id')->references('id')->on('package_loans');
            $table->integer('debt')->unsigned();
            $table->integer('cost_service')->unsigned();
            $table->integer('credit')->unsigned();
            $table->integer('cost_office')->unsigned();
            $table->integer('cost_gift')->unsigned();
            $table->integer('cost_saving')->unisgned();
            $table->integer('drop')->unsigned();
            $table->integer('payment')->unsigned();
            $table->integer('payment_left')->unsigned();
            $table->string('day');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('member_loans');
    }
}
