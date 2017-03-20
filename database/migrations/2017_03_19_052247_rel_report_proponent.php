<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelReportProponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_report_proponent', function (Blueprint $table) {
            $table->increments('rel_report_proponent_id')->unsigned();
            $table->integer('report_id')->unsigned();
            $table->integer('proponent_id')->unsigned();
            
            $table->tinyInteger('archived')->default(0);
            
            $table->timestamps();
            
            $table->foreign('report_id')
                  ->references('report_id')->on('tbl_report')
                  ->onDelete('cascade');
                  
            $table->foreign('proponent_id')
                  ->references('proponent_id')->on('tbl_proponent')
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
        
    }
}
