<?php
    /**
     * Created by TheProgrammer.
     */

    namespace App\Http\Controllers\helpers;

    use Illuminate\Support\Facades\DB;
    class courrierHelper
    {



        public function getExpediteurOrDestinataire($courrier, $i){
            $tab = [];
            if ($i ==1) {
                foreach ($courrier as $value) {

                    $getCobailExp=  DB::table('users')->where('id',$value->id_expediteur)->first();


                    array_push($tab,$getCobailExp);
                }

            }

            else {

                foreach ($courrier as $value) {

                    $getCobailExp=  DB::table('users')->where('id',$value->id_destinataire)->first();


                    array_push($tab,$getCobailExp);
                }
            }



            return $tab;

        }

        public function getMemberCourrier($courrier, $i) {

            $tab = [];
            if ($i ==1) {


                    $getCobailExp=  DB::table('users')->where('id',$courrier->id_expediteur)->first();


                    array_push($tab,$getCobailExp);


            }

            else {



                    $getCobailExp=  DB::table('users')->where('id',$courrier->id_destinataire)->first();


                    array_push($tab,$getCobailExp);

            }



            return $tab;
        }

    }
