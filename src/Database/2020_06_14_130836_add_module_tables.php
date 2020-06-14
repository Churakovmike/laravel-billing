<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModuleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->unsigned()->nullable(false)->default(0)->comment('Account type');
            $table->bigInteger('user_id')->unsigned()->nullable(false)->comment('User identity');
            $table->double('balance')->default(0)->comment('Account balance');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('account_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false)->comment('Account type name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('account', function (Blueprint $table) {
            $table->foreign('type_id', 'account_type_id_fk')->references('id')->on('account_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->dropForeign('account_type_id_fk');
        });
        Schema::dropIfExists('account');
        Schema::dropIfExists('account_type');
    }
}
