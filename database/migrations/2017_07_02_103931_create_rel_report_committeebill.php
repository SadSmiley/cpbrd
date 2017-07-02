<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelReportCommitteebill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_report_committeebill', function (Blueprint $table) {
            $table->increments('rel_report_committeebill_id')->unsigned();
            $table->integer('report_id')->unsigned();
            $table->integer('committeebill_id')->unsigned();
            
            $table->tinyInteger('archived')->default(0);
            
            $table->timestamps();
            
            $table->foreign('report_id')
                  ->references('report_id')->on('tbl_new_report')
                  ->onDelete('cascade');
                  
            $table->foreign('committeebill_id')
                  ->references('id')->on('committeebill')
                  ->onDelete('cascade');
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
