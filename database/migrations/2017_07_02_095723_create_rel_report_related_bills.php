<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelReportRelatedBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_report_related_bills', function (Blueprint $table) 
        {
            $table->increments('id')->unsigned();
            $table->integer('report_id')->unsigned();
            $table->integer('related_bills_id')->unsigned();
            
            $table->tinyInteger('archived')->default(0);
            
            $table->timestamps();
            
            $table->foreign('report_id')
                  ->references('report_id')->on('tbl_new_report')
                  ->onDelete('cascade');
                  
            $table->foreign('related_bills_id')
                  ->references('related_bills_id')->on('tbl_related_bills')
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
