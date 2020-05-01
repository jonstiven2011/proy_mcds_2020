<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$usr 			= new User;
    	$usr->fullname  = 'Johnnathan Steven Navarro';
    	$usr->email     = 'jonstivennava@gmail.com';
    	$usr->phone     = '315620888';
    	$usr->birthdate = '1994-12-31';
    	$usr->gender    = 'Male';
    	$usr->address   = 'Carrera 25 # 12-1';
    	$usr->password  = bcrypt('admin');
    	$usr->role      = 'admin';
    	$usr->save();
       factory(App\User::class, 20)->create();
    }
}