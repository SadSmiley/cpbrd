<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblReportSalient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_report', function ($table) {
            $table->dropColumn(['report_related_house_bill', 'report_related_senate_bill']);
            $table->text('report_salient_related_senate_bill');
            $table->text('report_salient_related_house_bill');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
