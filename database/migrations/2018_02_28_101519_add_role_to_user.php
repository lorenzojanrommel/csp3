<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('role', function (Blueprint $table) {
           $table->increments('id');
           $table->string('role');
           $table->timestamps();
       });
       Schema::table('users', function($table){
           $table->integer('user_role')->unsigned()->default('2');
           $table->foreign('user_role')
                 ->references('id')
                 ->on('role')
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
       Schema::dropIfExists('id');
       Schema::table('users', function($table){
        $table->dropForeign('user_role');
        $table->dropColumn('user_role');
        });
    }
}
