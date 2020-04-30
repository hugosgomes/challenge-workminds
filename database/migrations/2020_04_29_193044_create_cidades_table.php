<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCidadesTable.
 */
class CreateCidadesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cidades', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onDelete('cascade');

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
		Schema::drop('cidades');
	}
}
