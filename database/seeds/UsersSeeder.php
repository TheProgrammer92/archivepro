<?php

    use  App\User;
    use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder


{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name' => 'director',
            'prenom' => 'free',
            'email' => 'director@test.com',
            'password' => Hash::make('director'),
            'role' => 1,
            'code' => 1111,

        ]);

        User::create([
            'name' => 'Admin',
            'prenom' => 'free',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role' => 2,
            'code' => 2222,
        ]);



        User::create([
            'name' => 'User',
            'prenom' => 'free',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'role' => 3,
            'code' =>5555,

        ]);

    }
}
