<?php
    /**
     * Created by TheProgrammer.
     */

    namespace App\Http\Controllers\helpers;


    use App\User;

    class helpers
    {

        public function getAllMember() {


            $users = User::all();

            return response()->json(
                [
                    'status' => 'success',
                    'member' => $users->toArray()
                ], 200);


        }

    }
