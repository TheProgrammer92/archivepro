<?php

use Illuminate\Database\Seeder;
use App\model\NotifyModel;
class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotifyModel::create([
            'id_courrier' =>1,
            'id_destinataire' => 2,
            'id_expediteur' => 3,



        ]);

        NotifyModel::create([
            'id_courrier' =>2,
            'id_destinataire' => 1,
            'id_expediteur' => 3,


        ]);

        NotifyModel::create([
            'id_courrier' =>3,
            'id_destinataire' => 3,
            'id_expediteur' => 1,


        ]);


    }
}
