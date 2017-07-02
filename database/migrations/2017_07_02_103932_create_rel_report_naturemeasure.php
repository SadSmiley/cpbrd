<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelReportNaturemeasure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_report_naturemeasure', function (Blueprint $table) {
            $table->increments('rel_report_naturemeasure_id')->unsigned();
            $table->integer('report_id')->unsigned();
            $table->integer('naturemeasure_id')->unsigned();
            
            $table->tinyInteger('archived')->default(0);
            
            $table->timestamps();
            
            $table->foreign('report_id')
                  ->references('report_id')->on('tbl_new_report')
                  ->onDelete('cascade');
                  
            $table->foreign('naturemeasure_id')
                  ->references('id')->on('naturemeasure')
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
