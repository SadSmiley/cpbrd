<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_bill', function (Blueprint $table) {
            $table->increments('bill_id')->unsigned();
            $table->text('bill_content');
            $table->integer('report_id')->unsigned();
            $table->tinyInteger('archived')->default(0);
            $table->timestamps();
            
            $table->foreign('report_id')
                  ->references('report_id')->on('tbl_new_report')
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
