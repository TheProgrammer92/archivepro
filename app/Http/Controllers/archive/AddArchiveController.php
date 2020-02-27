<?php

namespace App\Http\Controllers\archive;

use App\Http\Requests\AddArchiveRequest;
use App\model\archive\ArchiveModel;
use App\model\archive\CategorieModel;
use App\model\archive\ServiceModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AddArchiveController extends Controller
{
    //

    public function getAll() {

        $archive = ArchiveModel::where('id_user',auth::user()->id)->get();
        $service = ServiceModel::where('role',auth::user()->role)->get();

        $categorie = CategorieModel::all();

        $tab =[];


        return response()->json(
            [
                'status' => 'success',
                'archive' => $archive,
                'categorie'=>$categorie,
                "service" => $service
            ], 200);
    }

    public function add(AddArchiveRequest $request) {

        $archive = new ArchiveModel();

        $archive->nom= $request->nom;
        $archive->id_service = $request->service;
        $archive->id_cat= $request->categorie;
        $archive->id_user= auth::user()->id;
        $archive->etat=0;
       $archive->fichier="Mon fichier.pdf";

        $archive->save();

        return response()->json(
            [
                'status' => 'success',
                'archive' => $archive
            ], 200);



    }


    public function search(Request $request) {

        $archive = DB::table("archive")
            ->where("nom",'LIKE',"%$request->search%")
            ->orWhere('etat','LIKE',"%$request->search%")
            ->get();

        $categorie = CategorieModel::all();
        $service = ServiceModel::where('role',auth::user()->role)->get();

        return response()->json(
            [
                'status' => 'success',
                'archive' => $archive,
                'categorie'=>$categorie,
                "service" => $service
            ], 200);


        }

        public function  editEtat(Request $request) {

        $archive = ArchiveModel::find($request->id);
        $archive->etat = $request->value;

        $archive->save();

            return response()->json(
                [
                    'status' => 'success',
                    'etat' => $archive
                ], 200);
        }

    public function process_file($request) {


        $uniqueFileName = Carbon::now()->timestamp .'programmer';


        $request->get('fichier')->move(public_path('storage/file/') . $uniqueFileName);


        //miniature




        return $uniqueFileName;


    }



}
