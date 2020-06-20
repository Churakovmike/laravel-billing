<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_from')->unsigned()->nullable(false)->default(0)->comment('Account from identifier');
            $table->bigInteger('account_to')->unsigned()->nullable(false)->comment('Account to identifier');
            $table->double('amount')->default(0)->comment('Transfer amount');
            $table->string('comment', 512)->nullable(true)->comment('Operation transfer comment');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('operations', function (Blueprint $table) {
            $table->foreign('account_from', 'operation_account_from_fk')->references('id')->on('accounts');
            $table->foreign('account_to', 'operation_account_to_fk')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operations', function (Blueprint $table) {
            $table->dropForeign('operation_account_from_fk');
            $table->dropForeign('operation_account_to_fk');
        });
        Schema::dropIfExists('operations');
    }
}
