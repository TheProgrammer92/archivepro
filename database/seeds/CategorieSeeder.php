<?php

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \App\model\archive\CategorieModel::create([

            'nom' => 'Informatique'
        ]) ;


        \App\model\archive\CategorieModel::create([

            'nom' => 'Programmation'
        ]);


     \App\model\archive\CategorieModel::create([

            'nom' => 'TheProgrammer'
        ]);






        \App\model\archive\CategorieModel::create([

            'nom' => 'ICT 303'
        ]);
    }
}
