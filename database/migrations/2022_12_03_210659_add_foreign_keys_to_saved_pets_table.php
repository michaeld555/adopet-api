<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSavedPetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('saved_pets', function(Blueprint $table)
		{
			$table->foreign('pet_id', 'fk_pet_id_saved_pets')->references('id_pet')->on('pets')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('saved_pets', function(Blueprint $table)
		{
			$table->dropForeign('fk_pet_id_saved_pets');
		});
	}

}
