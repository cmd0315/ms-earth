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
			$table->string('registration_id', 100);
			$table->string('first_name', 250);
			$table->string('last_name', 250);
			$table->date('birthdate');
			$table->integer('gender');
			$table->string('complete_address_1', 250);
			$table->string('complete_address_2', 250)->nullable();
			$table->string('email_address', 50);
			$table->string('contact_number', 20);
			$table->string('race_shirt_size', 5);
			$table->integer('contact_person_status')->default(1);
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
