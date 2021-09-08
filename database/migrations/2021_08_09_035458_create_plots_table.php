<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->integer('plotno');

            $table->integer('portfoliono');
            $table->integer('clientno');
            $table->date('date');
            $table->string('type');
            $table->string('mergone')->nullable();
            $table->string('mergtwo')->nullable();
            $table->string('split')->nullable();

            $table->string('areaname');
            $table->string('block');
            $table->integer('propertyvalue');
            $table->integer('financeamount');
            $table->integer('pairent');
            $table->string('licensedpurpose');
            $table->string('applicationno');
            $table->string('plotareasize');
            $table->date('pai_lc_issue');
            $table->date('pai_lc_expiry');
            $table->string('pai_lc_attach');
            $table->date('fi_issue');
            $table->date('fi_expiry');
            $table->string('fi_attach');
            $table->date('fl_issue');
            $table->date('fl_expiry');
            $table->string('fl_attach');
            $table->date('poa_moj_issue');
            $table->date('poa_moj_expiry');
            $table->string('poa_moj_issued_to');
            $table->date('poa_warba_issue');
            $table->date('poa_warba_expiry');
            $table->string('poa_warba_issued_to');
            $table->string('email_attach_newdeal');
            $table->string('email_attach_poa');


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
        Schema::dropIfExists('plots');
    }
}
