<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_report', function (Blueprint $table) {
            $table->increments('report_id')->unsigned();
            $table->string('report_legistative_agenda');
            $table->string('report_measures');
            
            $table->string('report_related_house_bill');
            $table->text('report_author_related_house_bill');
            $table->text('report_significance_related_house_bill');
            $table->text('report_status_related_house_bill');
            
            $table->string('report_related_senate_bill');
            $table->text('report_author_related_senate_bill');
            $table->text('report_significance_related_senate_bill');
            $table->text('report_status_related_senate_bill');
            
            $table->text('report_notes');
            
            $table->tinyInteger('archived')->default(0);
            
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
        //
    }
}
