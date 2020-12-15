<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['role_id' => '1', 'name' => 'Admin', 'email' => 'admin@email.com', 'password' =>'admin1234']
        ]);
    }
}
