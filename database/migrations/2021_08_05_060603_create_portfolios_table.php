<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('portfolioname');
            $table->double('mgfeepercentage');
            $table->double('minfeeperquarter');
            $table->string('feecalmethod');
            $table->string('contactperson');
            $table->integer('contactnumber');
            $table->string('contactemail');
            $table->string('agreementdate');
            $table->string('agreementexpdate');
            $table->string('agreementattach');

            $table->SoftDeletes();

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
        Schema::dropIfExists('portfolios');
    }
}
