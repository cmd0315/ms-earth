<?php

	class AdminSeeder extends BCDSeeder {

		protected $table = "admins";

		public function getData() {
			return [
				['username' => 'admin', 'password' => Hash::make('testing1234'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
				['username' => 'charisse_dalida', 'password' => Hash::make('testing123'), 'created_at' => new DateTime, 'updated_at' => new DateTime]
			];
		}
	}