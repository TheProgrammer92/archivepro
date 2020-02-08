<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\model\archive\RoleModel::create([

            'name' => 'archiviste',
            'role' => '1',

        ]);



        \App\model\archive\RoleModel::create([

            'name' => 'etudiant',
            'role' => '2',

        ]);




    }
}
