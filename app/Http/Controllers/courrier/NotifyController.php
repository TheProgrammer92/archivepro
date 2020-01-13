<?php

namespace App\Http\Controllers\courrier;

use App\Http\Controllers\helpers\courrierHelper;
use App\model\NotifyModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class notifyController extends Controller
{
    //

    public function notifyUser(Request $request,$id) {

        $notifyModel = new NotifyModel();

        $notifyModel->id_courrier = $id;
        $notifyModel->id_destinataire= $request->id_destinataire;
        $notifyModel->id_expediteur = $request->id_expediteur;

        $notifyModel->save();



    }

     public function getNotifyCourrier() {

        if(Auth::check()) {



             $user= User::findOrFail(auth::user()->id);

             $getCourrier=  DB::table('courrier')->where('id_destinataire',$user->id)->get();

             $cHelper= new courrierHelper();
             $getInfoExpediteur=$cHelper->getExpediteurOrDestinataire($getCourrier,1);

             return response()->json(
                 [
                     'status' => 'success',
                     'courrierNotify' =>$getCourrier,
                     "expediteurInfo"  =>$getInfoExpediteur,
                 ], 200);



     }

     }
}
