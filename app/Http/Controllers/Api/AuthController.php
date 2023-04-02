<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {


        $validator = Validator::Make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
   
         $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Registration Successfully'
         ];
         return response()->json($response,200);
        // return $this->sendResponse($success, 'User register successfully.');
    }
    public function login(Request $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'login Successfully'
             ];
             return response()->json($response,200);
        } 
        else{ 
            $response = [
                'success' => false,
                'message' => 'login Unsuccessfully'
             ];
             return response()->json($response);
        } 
    }

}
