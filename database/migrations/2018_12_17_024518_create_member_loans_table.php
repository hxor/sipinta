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
            $table->decimal('debt', 15, 2);
            $table->decimal('cost_service', 15, 2);
            $table->decimal('credit', 15, 2);
            $table->decimal('cost_office', 15, 2);
            $table->decimal('cost_gift', 15, 2);
            $table->decimal('cost_saving', 15, 2);
            $table->decimal('drop', 15, 2);
            $table->decimal('payment', 15, 2);
            $table->decimal('payment_left', 15, 2);
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
