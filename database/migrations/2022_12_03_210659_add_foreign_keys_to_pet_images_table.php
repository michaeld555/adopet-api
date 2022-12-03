<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPetImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pet_images', function(Blueprint $table)
		{
			$table->foreign('id_pet', 'fk_id_pet')->references('id_pet')->on('pets')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pet_images', function(Blueprint $table)
		{
			$table->dropForeign('fk_id_pet');
		});
	}

}
