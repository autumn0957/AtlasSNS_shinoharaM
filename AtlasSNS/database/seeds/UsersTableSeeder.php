<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'misaki',
            'mail' => 'misaki@mail.com',
            'password' => bcrypt('0957'),//メソッド bcrypt
            // 'password_confirmation' => bcrypt('password')
            'bio' => 'I am misaki',
            'created_at' => new DateTime()
            // 'modified_at' => new DateTime(),
        ]);
    }
}
