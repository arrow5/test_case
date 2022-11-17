<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name');
            $table->string('name_iso');
            $table->string('code_iso');
            $table->string('symbol_iso');
            $table->boolean('active')->default(0);
            $table->string('name1');
            $table->string('name2');
            $table->string('name3');
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
        Schema::dropIfExists('currencies');
    }
}
