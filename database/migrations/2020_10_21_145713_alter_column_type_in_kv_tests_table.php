<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnTypeInKvTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kv_tests', function (Blueprint $table) {
            $table->longText('vopros')->change();
            $table->longText('otvet1')->change();
            $table->longText('otvet2')->change();
            $table->longText('otvet3')->change();
            $table->longText('otvet4')->change();
            $table->longText('otvet5')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kv_tests', function (Blueprint $table) {
            $table->text('vopros')->change();
            $table->text('otvet1')->change();
            $table->text('otvet2')->change();
            $table->text('otvet3')->change();
            $table->text('otvet4')->change();
            $table->text('otvet5')->change();
        });
    }
}
