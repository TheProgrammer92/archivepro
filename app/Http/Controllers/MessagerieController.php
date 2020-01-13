<?php

namespace App\Http\Controllers;

use App\model\Messagerie;
use App\model\Msg_reception;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class MessagerieController extends Controller
{
    public function __construct(Request $request)
    {



        $this->middleware('auth:api');

    }

    public  function getAllMember() {


            $users = User::all();

            return response()->json(
                [
                    'status' => 'success',
                    'users' => $users->toArray()
                ], 200);


    }

    //inserer dans la page reception

    public function insertReception(Request $request) {
        //verification, s'il existe deja , dans la table reception
        $user= User::find(auth::user()->id);

        $v= Validator::make($request->all(), [
            'id_recepteur'=>'required|integer',
        ]);



        if ($v->fails())
        {


            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $countVerifyExistReception= DB::table('msg_reception')->where('id_recepteur',$request->id_recepteur)->where('mon_id',$user->id)->count();

        if ($countVerifyExistReception==0){


            $msg_reception = new Msg_reception();

            $msg_reception->id_recepteur= $request->id_recepteur;
            $msg_reception->mon_id= $user->id;

            $msg_reception->save();

            return response()->json([

                "EXIST_RECEPTION"=>"false"
            ],200);

        }
        elseif ($countVerifyExistReception>0)  {

            return response()->json([

                "EXIST_RECEPTION"=>"true"
            ],200);
        }
        else {

            return response()->json([

                "EXIST_RECEPTION"=>"error"
            ],200);
        }



    }


    public function showAccueil() {

        $user= User::find(auth::user()->id);
        $getReception= DB::table('msg_reception')->where('mon_id',$user->id)->get();
        $tabResponseUser=[];
        $getUser= [];



        foreach ($getReception as $value) {

            $getUser=  DB::table('users')->where('id',$value->id_recepteur)->get();


            array_push($tabResponseUser,$getUser[0]);
        }


        return response()->json([

            "userResponse"=>$tabResponseUser
        ],200);






    }

    public function getMessage(Request $request) {
        $user= User::find(auth::user()->id);

        $getMyMsg=DB::table('messagerie')->where('mon_id',$user->id)->where('id_recepteur',$request->id_receptor)->orderBy('created_at','desc')->paginate(5);;
        $getHerMsg=DB::table('messagerie')->where('mon_id',$request->id_receptor)->where('id_recepteur',$user->id)->orderBy('created_at','desc')->paginate(5);;


        return response()->json([

            "myMsg"=>$getMyMsg,
            "herMsg"=>$getHerMsg
        ],200);




    }

    public function sendMessage(Request $request) {

        $v = Validator::make($request->all(), [
            'id_recepteur' => 'required|integer',
            'message' => 'required|string',

        ]);



        if ($v->fails())
        {


            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $message = new Messagerie();
        $message->id_recepteur = $request ->id_recepteur;
        $message->message = $request->message;
        $user= User::find(auth::user()->id);
        $message->mon_id = $user->id;
        $message->save();

        //recuperation du dernier message envoyé par lui




        return response()->json(['status' => 'success','element'=> $message], 200);
    }
}
