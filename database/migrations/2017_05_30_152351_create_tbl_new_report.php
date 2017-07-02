<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNewReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_new_report', function (Blueprint $table) {
            $table->increments('report_id')->unsigned();
            $table->string('title_measure');
            $table->text('background');
            $table->string('charts');
            $table->binary('opinion');
            $table->binary('features');
            $table->string('bill');
            $table->text('status');
            $table->string('nature_measure');
            $table->tinyInteger('committee_bill')->default(0);
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
