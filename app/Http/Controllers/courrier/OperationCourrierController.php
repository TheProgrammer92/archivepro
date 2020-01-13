<?php

namespace App\Http\Controllers\courrier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationCourrierController extends Controller
{
    // operation for courriel
    // le courriel peut etre maqué comme lu , en attente, lost , send

        public function deliveCourrier(Request $request) {




        $this->setOperationCourriel("delivered",$request);


    }

    public function isAttending(Request $request) {

        $this->setOperationCourriel("isAttending",$request);

    }

    public function isSend(Request $request) {

        $this->setOperationCourriel("isSend",$request);



    }
    public function isLost(Request $request) {

        $this->setOperationCourriel("isLost",$request);

    }


    public function  setOperationCourriel($typeOperation,Request $request) {

        DB::table('courrier')
            ->where('id', $request->id)
            ->update([$typeOperation => 1]);

        return ['message'=>" Le courrier a été modifié"];
    }
}
