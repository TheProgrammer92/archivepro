<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdateUserController extends Controller
{
    //



    public function update(Request $request){

            $user= User::findOrFail(Auth::user()->id);

            //verification de l'existance du password dans la tableau et cryptage
            /*if (isset($request->password) and !empty($request->password)){

                $password= bcrypt($request->password);

                $request->password=$password;
            }*/
           $v= Validator::make($request->all(),[

               'name' =>'required|sometimes|min:3',
               'prenom'=>'required|sometimes|min:3',
               'telephone'=>'required|sometimes|integer|numeric',
               'sexe' => 'required|sometimes|min:3|max:7'



           ]);

        if ($v->fails())
        {


            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $user->update($request->all());

        return ['message'=>" le nom a été modifié"];

    }

    public function updatePassword(Request $request) {

        $user= User::find(Auth::user()->id);

        if (!Hash::check($request->old_password,Auth::user()->password)){

            return response()->json([
                'status' => 'error',
                'errors' => ['old_password'=>array("le password en le n'est pas notre base")]
            ], 422);        }

        else{




            $validate= Validator::make($request->all(), [

                'password' =>'required|min:3|confirmed'
            ]);

            $newPassword= $request->password;




            if ($validate->fails()){

                return response()->json([
                    'status' => 'error',
                    'errors' => $validate->errors()
                ], 422);

            }
        }



        $user->fill(['password'=>Hash::make($newPassword)])->save();


        return ['message'=>" le password a été modifié"];
    }

    public function updateEmail(Request $request) {

        $user= User::find(Auth::user()->id);

        if (!($request->old_email==Auth::user()->email)){

            return response()->json([
                'status' => 'error',
                'errors' => ['old_email'=>array("l'email n'existe pas dans notre base")]
            ], 422);        }

        else{



            $validate= Validator::make($request->all(), [
                'email' =>'required|min:3|email|same:email_confirmation|unique:users,email,'.Auth::user()->id

            ]);


            $newEmail= $request->email;


            if ($validate->fails()){

                return response()->json([
                    'status' => 'error',
                    'errors' => $validate->errors()
                ], 422);

            }
        }



        $user->fill(['email'=>$newEmail])->save();


        return ['message'=>" l'email été modifié"];
    }

    public function updateAvatar(Request $request) {
        $user= User::find(Auth::user()->id);

        $validate= Validator::make($request->all(), [
            'userName' =>'image'

        ]);

        $image= $request->image;

        if ($validate->fails()){

            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ], 422);

        }

        $user->fill(['userName'=>$image])->save();


        return ['message'=>" l'avatar été modifié"];
    }


}
