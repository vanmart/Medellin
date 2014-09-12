<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorMinutoTable extends Migration {

	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('valor_minuto', function($table){
			$table->increments('id');
			$table->string('minuto');
			$table->integer('valor');
			$table->timestamps();

		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('valor_minuto');//
	}

}
