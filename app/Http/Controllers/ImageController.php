<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

use App\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    //

    public function store(Request $request)
    {




        $validator = Validator::make($request->all(), [
                'image' => 'required|image64:jpeg,jpg,png'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()]);
            }

            else {



                    $user= User::find(auth::user()->id);
                    $imageData = $request->get('image');
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];


                    //miniature

                    $imgMin = Image::make($request->get('image'))->resize(500, 400, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imgMin->save(public_path('storage/userMiniature/').$fileName);


                    //image

                    Image::make($request->get('image'))->save(public_path('storage/user/').$fileName);


                    //save bd image
                    $user->fill(['avatar'=>$fileName])->save();

                    return response()->json(['error'=>false]);

                    //save image bd






            }









    }
}
