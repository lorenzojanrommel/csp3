<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserStatusToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('users', function($table){
            $table->integer('user_status')->unsigned()->default('1');
            $table->foreign('user_status')
                  ->references('id')
                  ->on('status')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
        Schema::table('users', function($table){
         $table->dropForeign('user_status');
         $table->dropColumn('user_status');
         });

    }
}
