<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\model\archive\ServiceModel::create([

            'nom' => 'Business Service'
        ]);


        \App\model\archive\ServiceModel::create([

            'nom' => 'Programmation Service'
        ]);


        \App\model\archive\ServiceModel::create([

            'nom' => 'Regular service'
        ]);




    }
}
