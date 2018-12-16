<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('installment')->unsigned();
            $table->float('cost_service', 0);
            $table->float('cost_office', 0);
            $table->float('cost_gift', 0);
            $table->float('cost_saving', 0);
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
        Schema::dropIfExists('package_loans');
    }
}
