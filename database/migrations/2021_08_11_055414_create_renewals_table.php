<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenewalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renewals', function (Blueprint $table) {
            $table->id();
            $table->string('reportfoliono');
            $table->string('reclientno');
            $table->string('replotno');
            $table->string('repai_lc_issue');
            $table->string('repai_lc_expiry');
            $table->string('repai_lc_attach');
            $table->string('refi_issue');
            $table->string('refi_expiry');
            $table->string('refi_attach');
            $table->string('refl_issue');
            $table->string('refl_expiry');
            $table->string('refl_attach');
            $table->string('repoa_moj_issue');
            $table->string('repoa_moj_expiry');
            $table->string('repoa_moj_issued_to');
            $table->string('repoa_warba_issue');
            $table->string('repoa_warba_expiry');
            $table->string('repoa_warba_issued_to');
            $table->string('reemail_attach_newdeal');
            $table->string('reemail_attach_poa');


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
        Schema::dropIfExists('renewals');
    }
}
