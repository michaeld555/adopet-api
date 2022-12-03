<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pets', function(Blueprint $table)
		{
			$table->foreign('id_pet_breed', 'fk_id_pet_breed_pets')->references('id_pet_breed')->on('pet_breed')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_pet_city', 'fk_id_pet_city_pets')->references('id_city')->on('city')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_pet_gender', 'fk_id_pet_gender_pets')->references('id_pet_gender')->on('pet_gender')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_pet_type', 'fk_id_pet_type_pets')->references('id_type_pets')->on('type_pets')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pets', function(Blueprint $table)
		{
			$table->dropForeign('fk_id_pet_breed_pets');
			$table->dropForeign('fk_id_pet_city_pets');
			$table->dropForeign('fk_id_pet_gender_pets');
			$table->dropForeign('fk_id_pet_type_pets');

		});
	}

}
