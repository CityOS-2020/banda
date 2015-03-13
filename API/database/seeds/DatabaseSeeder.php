<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
                /*
                 * user table
                 */
                DB::table('users')->delete();
                User::create([
                    'email' => 'nomail@mail.com',
                    'name' => 'smartlight',
                    'password' => Hash::make('justanotherpw')
                    ]);
	}

}
