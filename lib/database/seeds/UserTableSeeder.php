<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'email'=>'admin@cphonevn.com',
        		'password'=>bcrypt('admin'),
        		'level'=>1
        	],
        	[
        		'email'=>'quyendo@cphonevn.com',
        		'password'=>bcrypt('Cphone123'),
        		'level'=>2
        	],
        ];
        DB::table('users')->insert($data);
    }
}
