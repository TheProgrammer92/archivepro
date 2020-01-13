<?php

use Illuminate\Database\Seeder;


use App\model\CourrierModel;
class NewCourrielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourrierModel::create([
            'numero' => '6983411',
            'id_expediteur' => 1,
            'id_destinataire' => 2,
            'type' => "lettre",
            'delivered' => 0,


        ]);

        CourrierModel::create([
            'numero' => '6983411',
            'id_expediteur' => 2,
            'id_destinataire' => 1,
            'type' => "lettre",
            'delivered' => 1,


        ]);

        CourrierModel::create([
            'numero' => '655452144',
            'id_expediteur' => 3,
            'id_destinataire' => 1,
            'type' => "courriel",
            'delivered' => 0,


        ]);
        CourrierModel::create([
            'numero' => '62545125',
            'id_expediteur' => 2,
            'id_destinataire' => 3,
            'type' => "moderne",
            'delivered' => 0,


                ]);





    }
}
