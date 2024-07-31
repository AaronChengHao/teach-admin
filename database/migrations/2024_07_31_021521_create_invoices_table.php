<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('course_id')->comment('课程id');
            $table->bigInteger('student_id')->comment('学生id');
            $table->smallInteger('status')->comment('状态 1未支付 2已支付');
            $table->dateTime('pay_at')->comment('支付时间');
            $table->decimal('price',8,2)->comment('价格');
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
        Schema::dropIfExists('invoices');
    }
}
