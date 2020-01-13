<?php

namespace App\Http\Controllers;

use App\model\video_comments;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use App\model\Video_categories;
use App\model\Video_sous_categories;
use App\User;
use App\model\video_replique_comments;
use App\model\Video_play;

class VideoController extends Controller
{


    public function getCategoriesVideo(){

        $catVideo = DB::table('video_categories')->get();

        return response()->json([
            'status' => 'success',
            'categories_video' => $catVideo
        ], 200);
       /* return response()->json([
            'status' => 'success',
            'categories_video' => "yo"
        ], 200);*/

    }

    public function getSousCategoriesVideo(){

        $sousCatVideo = DB::table('video_sous_categories')->get();

        return response()->json([
            'status' => 'success',
            'sous_categories_video' => $sousCatVideo
        ], 200);
    }


    public function getRecentVideo(Request $request) {
        //verify, if the id in url is true
         $countGetVideo= DB::table('video_play')->where('id_sous_cat',$request->idSousCatParams)->count();

        if ($countGetVideo>0){

            $getVideoAffiche = DB::table('video_play')->where('id_sous_cat',$request->idSousCatParams)->get();

            return response()->json([
                'status' => 'success',
                'found'=>1,
                'getVideoAffiche' =>$getVideoAffiche
            ], 200);

        }

        //return error 0  not found video in this categories
        else{
            return response()->json([
                'status' => 'notFound',
                'found' =>0
            ]);

        }


    }

    //get video for play
    public function getVideo(Request  $request){

        $getCountVideo= DB::table('video_play')->where('id',$request->id_video)->where('id_sous_cat',$request->id_sous_cat)->count();


        if ($getCountVideo>0){

            $getVideo= DB::table('video_play')->where('id',$request->id_video)->get();

            return response()->json([
                'found' =>1,
                'getVideo' =>$getVideo
            ], 200);


        }
        else{

            return response()->json([
                'status' => 'success',
                'found' =>0
            ]);

        }




    }

    public function getUniqueVideo(Request $request) {

        $getUniqueVideo=DB::table('video_play')->where('id',$request->id_video)->where('id_sous_cat',$request->id_sous_cat)->get();


        return response()->json([
            'getUniqueVideo' =>$getUniqueVideo
        ], 200);

    }


    public  function getComments(Request $request) {

        $getComment =DB::table('video_comments')->where('id_video',$request->id_video)->orderBy('created_at', 'desc')->paginate(5);




        //ajout des info du user
        $arrayInfoUser=[];

        foreach($getComment as $element){

          $getUser=DB::table('users')->where('id',$element->id_users_post_comments)->get();


            array_push($arrayInfoUser,$getUser);
        }



        return response()->json([
            'found' =>1,
            'getComment' =>$getComment,
            'userInfo'=>$arrayInfoUser
        ], 200);
    }

    public function getRepliqueComments(Request $request) {


        $getRepliqueComent=DB::table('video_replique_comments')->where('id_video_comment',$request->id_video_comment)->get();

        return response()->json([
            'found' =>1,
            'getRepliqueComment' =>$getRepliqueComent
        ], 200);
    }


    public function verifyRepliqueComment (Request $request){

        $verify=DB::table('video_replique_comments')->where('id_video_comment',$request->id_video_comment)->count();

        if ($verify>0){

            return response()->json([
                'verify' =>1
            ], 200);
        }

        else {

            return response()->json([
                'verify' =>0
            ]);
        }

    }


    public function postComment(Request $request){

        if (Auth::check()){



            $v= Validator::make($request->all(), [
                'id_video'=>'required|integer',
                'message_comment'=>'required|string|min:1'
            ]);



            if ($v->fails())
            {


                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }


            $comment = new video_comments;
            $comment->id_users_post_comments =Auth::user()->id;
            $comment->message_comment = $request ->message_comment;
            $comment->id_video = $request->id_video;
            $comment->save();

            return response()->json(['status' => 'success'], 200);
        }

        else{

            return response()->json(['status' => 401], 200);

        }



    }

    public  function  postRepliqueComment(Request $request) {


        if (Auth::check())

        {



            $v=Validator::make($request->all(), [

                'message_replique_comment'=>'required|string|min:1'
            ]);


            if ($v->fails())
            {


                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }



            $newRepliqueCommment = new video_replique_comments;
            $newRepliqueCommment->id_users_replique = Auth::user()->id;
            $newRepliqueCommment->id_video_comment =$request->id_video_comment;
            $newRepliqueCommment->message_replique_comment = $request->message_replique_comment;
            $newRepliqueCommment->save();

            //on dit a la tableau  commentaire qu'il ya une reponse

            DB::table('video_comments')
                ->where('id', $request->id_video_comment)
                ->update(['response_comment' => 1]);

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json([
            'status'=>401,
            'message'=>'not found'
        ]);

    }






}


