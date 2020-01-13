<?php

namespace App\Http\Controllers;

use App\model\Temoignage;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class UpdateTemoignageController extends Controller
{
    //

    public function update(Request $request){

        $user= User::findOrFail(Auth::user()->id);


        $v = Validator::make($request->all(),[

            'name' =>'required|min:3',
            'webSite'=>'required|sometimes|min:3',
            'bio' => 'required|sometimes',
            'ville' => 'required|min:3',
            'telephone'=>'required|integer|numeric',
            'sexe' => 'required|boolean',
            'profession' => 'required|min:3',
            'pays' => 'required|min:3',
            'email' =>'required|min:3|email|unique:users,email,'.Auth::user()->id,

        ]);

        if ($v->fails())
        {


            return response()->json(
                [
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $user->update($request->all());

        return ['message'=>" les information on été modifié"];

    }

    public function getFamilly(Request $request) {


        $tabGetUser = [];

        /*le type serra dynamique, varier en fonction de pro, familly, amis...*/
        $family= DB::table('temoignage')->where("type",$request->type)->get();

      // parcours, pour  recuperation des utilisateur qui l'ont posté

        foreach($family as $value) {

            $getUser= DB::table('users')->where("id",$value->id_users)->get();


            array_push($tabGetUser,$getUser[0]);


        }

         return response()->json([
             'status' => 'success',
             'family' => $family,
             'getUser'=> $tabGetUser
         ], 200);


    }

    public function make(Request $request) {



        $v= Validator::make($request->all(),[

            'type' =>'required|string|min:3',
            'temoignage'=>'required|string|min:3',


        ]);

        if ($v->fails())
        {


            return response()->json(
                [
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
        }
        $temoignage = new Temoignage;
        $temoignage->id_users = Auth::user()->id;
        $temoignage->type = $request->type;
        $temoignage->temoignage =$request->temoignage;
        $temoignage->save();


        return true;

    }





}
