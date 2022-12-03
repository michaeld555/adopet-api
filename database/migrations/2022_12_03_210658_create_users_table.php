<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id_user');
			$table->string('email', 250)->nullable();
			$table->string('password', 150)->nullable();
			$table->string('name', 150)->nullable();
			$table->string('phone', 19)->nullable();
			$table->text('jwt_token')->nullable();
			$table->string('google_user_id', 150)->nullable();
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
		Schema::drop('users');
	}

}
