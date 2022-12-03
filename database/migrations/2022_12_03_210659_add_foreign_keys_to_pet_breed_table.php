<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPetBreedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pet_breed', function(Blueprint $table)
		{
			$table->foreign('id_type_pet', 'fk_id_type_pet_pets_breed')->references('id_type_pets')->on('type_pets')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pet_breed', function(Blueprint $table)
		{
			$table->dropForeign('fk_id_type_pet_pets_breed');
		});
	}

}
