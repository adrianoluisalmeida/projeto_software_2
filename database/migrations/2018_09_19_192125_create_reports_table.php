<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->text('photo');
            $table->string('address');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->date('closing_date')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('entity_id')->index();
            $table->foreign('entity_id')->references('id')->on('entities');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign('reports_category_id_foreign');
            $table->dropForeign('reports_entity_id_foreign');
            $table->dropForeign('reports_user_id_foreign');
        });

        Schema::dropIfExists('reports');
    }
}
