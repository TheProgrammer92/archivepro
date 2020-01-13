<?php

namespace App\Http\Controllers;

use App\Http\Controllers\courrier\notifyController;
use App\Http\Controllers\helpers\courrierHelper;
use App\Http\Controllers\helpers\Helpers;
use App\model\CourrierModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class CourrierController extends Controller
{



    public function getAllUser() {

        $users = User::all();

        return response()->json(
            [
                'status' => 'success',
                'member' => $users->toArray()
            ], 200);


    }


    public function registerCourriel(Request $request) {

        $courrier = new CourrierModel();

        $v = Validator::make($request->all(), [
            'id_expediteur' => 'required|integer',
            'id_destinataire' => 'required|integer',
            'type'  => 'required|String|min:3',
            'numero'=>'required|integer',
        ]);



        if ($v->fails())
        {


            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }






        $courrier->id_expediteur = $request ->id_expediteur;
        $courrier->id_destinataire = $request->id_destinataire;
        $courrier->type = $request->type;
        $courrier->numero =$request->numero;


        $courrier->save();

        $notify =new NotifyController();

        //id de l'element inseré
        $id =$courrier->id;
        $notify->notifyUser($request,$id);
        return response()->json(['status' => 'success'], 200);
    }


    public function getAllCourrier() {

        $courrier = CourrierModel::all();

        $getExpediteur=[];
        $getDestinataire= [];


        $cHelper= new courrierHelper();



        $getExpediteur=$cHelper->getExpediteurOrDestinataire($courrier,1);
        $getDestinataire =$cHelper->getExpediteurOrDestinataire($courrier,2);



        return response()->json(
            [
                'status' => 'success',
                'courrier' =>$courrier,
                "expediteur"  =>$getExpediteur,
                "destinataire"  =>$getDestinataire
            ], 200);


    }


    public function getAllCourrierDelivered() {

        $courrierDelivered = CourrierModel::all();

        $getExpediteur=[];
        $getDestinataire= [];

        $cHelper= new courrierHelper();
        $getExpediteur=$cHelper->getExpediteurOrDestinataire($courrierDelivered,1);
        $getDestinataire=$cHelper->getExpediteurOrDestinataire($courrierDelivered,2);




        return response()->json(
            [
                'status' => 'success',
                'courrier' =>$courrierDelivered,
                "expediteur"  =>$getExpediteur,
                "destinataire"  =>$getDestinataire
            ], 200);


    }





    public function searchCourrier(Request $request) {

        $getInfoUser = DB::table("users")
            ->where("name",'LIKE',"%$request->search%")
            ->orWhere('code','LIKE',"%$request->search%")
            ->get();

        $tabSearchCourrier=[];
        $tabExpeditorCourrier=[];
        foreach ($getInfoUser as $value){

            $querySearch = DB::table("courrier")
                ->where("id_destinataire",$value->id);

            if ($querySearch->count()>0) {

                $searchCourrier =$querySearch->get();
                $tabExpeditor =  $value;


                array_push($tabSearchCourrier,$searchCourrier[0]);
                array_push($tabExpeditorCourrier,$tabExpeditor);
            }


        }

        return response()->json(
            [
                'status' => 'success',
                'tabSearchCourrier' =>$tabSearchCourrier,
                "infoUser"  =>$getInfoUser,
                "tabExpeditorCourrier"  =>$tabExpeditorCourrier,
            ], 200);

    }



    public function getCourrierSend() {

        $user= User::findOrFail(Auth::user()->id);


        $getCourrierReceived=   DB::table('courrier')
            ->where('id_expediteur', $user->id)
            ->orderBy('created_at','desc')
            ->limit(4)
           ->get();
        $courrierH= new courrierHelper();
        $getInfoUserSend = [];

        foreach ($getCourrierReceived as $value) {

            $tabCourrier =$courrierH->getMemberCourrier($value,2);

            array_push($getInfoUserSend,$tabCourrier);

        }


        return response()->json(
            [
                'status' => 'success',
                'getCourrierSend' =>$getCourrierReceived,
                'getInfoUserSend' =>$getInfoUserSend[0]
            ], 200);


    }

    public function getCourrierReceived() {

        $user= User::findOrFail(Auth::user()->id);
        $courrierH= new courrierHelper();



        $getCourrierReceived = DB::table('courrier')
            ->where('id_destinataire', $user->id)
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();

        $getInfoUserReceived = [];
        foreach ($getInfoUserReceived as $value) {

            $tabCourrier =$courrierH->getMemberCourrier($value,1);

            array_push($getInfoUserReceived,$tabCourrier);

        }

        return response()->json(
            [
                'status' => 'success',
                'getCourrierReceived' =>$getCourrierReceived,
                'getInfoUserReceived' =>$getInfoUserReceived
            ], 200);

    }



}

