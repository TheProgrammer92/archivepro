<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\LoginRequest;
    use Illuminate\Http\Request;


/*    use Tymon\JWTAuth\JWTAuth;*/
        use Illuminate\Support\Facades\Auth;

    use Illuminate\Support\Facades\Validator;

    use App\User;

    class AuthController extends Controller
    {
        /**
         * Create a new AuthController instance.
         *
         * @return void
         */
        public function __construct(Request $request)
        {
/*           $this->middleware('auth:api', ['except' => ['login','me']]);*/
            $this->middleware('jwt.refresh')->only('refresh');

            $this->middleware('auth:api', ['except' => ['login','register']]);

        }

        public function test() {

            $t = auth('api')->refresh();

            return response()->json([
                "auth"=>$t
            ]);
        }

        /**
         * Get a JWT via given credentials.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function register(Request $request)
        {

            $user = new User;

            $v = Validator::make($request->all(), [
                'name' => 'required|min:4',
                'email' => 'required|email|unique:users',
                'password'  => 'required|min:3|confirmed',
                'code'  => 'required|sometimes|integer|min:4',
            ]);



            if ($v->fails())
            {


                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }

            if ($request->code==1111) {

                $responseCode=true;
                $user->role=2;

            }

            else {

                $request->code= rand(1000,9999);
                $user->role =3;

                $responseCode=true;

            }

            if ($responseCode) {

                $user->name = $request ->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->code =$request->code;

                $user->avatar="user.jpeg";


                $user->save();

                return response()->json(['status' => 'success','code'=>$request->code], 200);
            }


        }


        public function registerClient(Request $request)
        {

            $user = new User;

            $v = Validator::make($request->all(), [
                'name' => 'required|min:4',
                'email' => 'required|email|unique:users',
                'password'  => 'required|min:3',
                'telephone'=>'required|integer',
                'sexe'=>'required|integer'
            ]);



            if ($v->fails())
            {


                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }


                $code = rand(1000,9999);
                $request->code= rand(1000,9999);




                $user->name = $request ->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->telephone =$request->telephone;
                $user->sexe=$request->sexe;
                $user->code =$request->code;


                //verification s'il est gestionnaire, ou client
                if ($request->whatMember=="gestionnaire") {

                    $user->role =2;
                }

                elseif ($request->whatMember=="client") {
                    $user->role =3;
                }



                $user->save();

                return response()->json(['status' => 'success','code'=>$request->code], 200);
            }





        public function login(Request $request)
        {


            $credentials = $request->only('email', 'password');
                if (!$token =auth('api')->attempt($credentials)) {

                    return response()->json(['error' => 'Unauthorized'], 401);


                }



            /* return $this->respondWithToken($token);*/
          return response()->json([
                'status' => 'success',
                'access_token' => $token,
                'user'=>$this->guard()->user(),
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ])->header('Authorization', $token);

        }

        /**
         * Get the authenticated User.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function me()
        {

          /* $user = User::find(Auth::user()->id);*/
           $user = auth('api')->user();



           return response()->json([
                'status' => 'success',
                'data' => $user
            ]);






        }

        /**
         * Log the user out (Invalidate the token).
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function logout()
        {
            /*auth()->logout();*/

            auth('api')->logout();


            return response()->json(['message' => 'Successfully logged out']);
        }

        /**
         * Refresh a token.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function refresh()
        {


            return response()->json();





        }


        protected function respondWithToken($token)
        {
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ])->header('Authorization', $token);
        }

        private function guard()
        {
            return Auth::guard('api');
        }
    }
