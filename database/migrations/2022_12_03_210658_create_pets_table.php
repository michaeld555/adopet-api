<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pets', function(Blueprint $table)
		{
			$table->integer('id_pet', true);
			$table->string('pet_name', 500)->nullable();
			$table->integer('id_pet_type')->nullable()->index('fk_id_pet_type_pets');
			$table->integer('id_pet_breed')->nullable()->index('fk_id_pet_breed_pets');
			$table->integer('id_pet_gender')->nullable()->index('fk_id_pet_gender_pets');
			$table->integer('pet_age')->nullable();
			$table->string('pet_description', 2000)->nullable();
			$table->integer('id_user')->nullable();
			$table->integer('id_pet_city')->nullable()->index('fk_id_pet_city_pets');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pets');
	}

}
