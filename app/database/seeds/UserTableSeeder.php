<?php
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'email' => 'admin@email.com',
            'password' => Hash::make('as'),
            'token' => Hash::make('a')
        ));
 
        User::create(array(
            'email' => 'guest@email.com',
            'password' => Hash::make('as'),
            'token' => Hash::make('a')
        ));
    }
 
}
