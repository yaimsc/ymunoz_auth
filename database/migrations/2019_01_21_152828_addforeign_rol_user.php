<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddforeignRolUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->unsignedInteger('rol_id')->default(1);
    //
    //         $table->foreign('rol_id')->references('id')->on('rols');
    //     });
    // }
    //
    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //       $table->dropForeign('users_rol_id_foreign');
    //       $table->dropColumn('rol_id');
    //     });
    // }
}
