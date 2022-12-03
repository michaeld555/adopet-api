<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pet_images', function(Blueprint $table)
		{
			$table->integer('id_pet_image', true);
			$table->string('url_image', 500)->nullable();
			$table->integer('id_pet')->nullable()->index('fk_id_pet');
			$table->dateTime('created_at')->nullable();
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
		Schema::drop('pet_images');
	}

}
