<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelReportMonitoring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_report_monitoring', function (Blueprint $table) {
            $table->increments('rel_report_monitoring_id')->unsigned();
            $table->integer('report_id')->unsigned();
            $table->integer('monitoring_id')->unsigned();
            
            $table->tinyInteger('archived')->default(0);
            
            $table->timestamps();
            
            $table->foreign('report_id')
                  ->references('report_id')->on('tbl_new_report')
                  ->onDelete('cascade');
                  
            $table->foreign('monitoring_id')
                  ->references('id')->on('monitoring')
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
