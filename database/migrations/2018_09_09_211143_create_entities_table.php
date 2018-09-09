<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('street');
            $table->string('number');
            $table->string('complement');

            $table->unsignedInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('cities');

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

        Schema::table('entities', function (Blueprint $table) {
            $table->dropForeign('entities_city_id_foreign');
            $table->dropForeign('entities_city_id_foreign');
        });

        Schema::dropIfExists('entities');
    }
}
