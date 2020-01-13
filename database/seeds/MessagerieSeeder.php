<?php

use Illuminate\Database\Seeder;
use App\model\Messagerie;
class MessagerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Messagerie::create([
            'id_recepteur' => '2',
            'mon_id' => '1',
            'message' => "salut petit  , comment tu vas",
            'vue' => 0
        ]);

        Messagerie::create([
            'id_recepteur' => '1',
            'mon_id' => '2',
            'message' => "salut petit  , comment tu vas",
            'vue' => 0
        ]);

        Messagerie::create([
            'id_recepteur' => '2',
            'mon_id' => '1',
            'message' => "hmm TheProgrammer, tu es le meilleur",
            'vue' => 0
        ]);

        Messagerie::create([
            'id_recepteur' => '1',
            'mon_id' => '2',
            'message' => "ehhhh tu es ou, mdr",
            'vue' => 0
        ]);
    }
}
