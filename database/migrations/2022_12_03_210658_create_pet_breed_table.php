<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetBreedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_breed', function(Blueprint $table)
		{
			$table->integer('id_pet_breed', true);
			$table->string('breed_name', 300)->nullable();
			$table->integer('id_type_pet')->nullable()->index('fk_id_type_pet_pets_breed');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pet_breed');
	}

}
