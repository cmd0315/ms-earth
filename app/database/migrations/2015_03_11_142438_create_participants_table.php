<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('registration_id', 100)->unique();
			$table->string('first_name', 60);
			$table->string('middle_name', 60);
			$table->string('last_name', 60);
			$table->date('birthdate');
			$table->integer('sex');
			$table->string('street', 250);
			$table->string('city', 250);
			$table->string('province', 250);
			$table->string('email_address', 50);
			$table->string('contact_number', 20);
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
		Schema::drop('participants');
	}
}
