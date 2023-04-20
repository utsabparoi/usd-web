<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Investor extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investors = User::all();
        return response()->json([
            'status'=> true,
            'data'=>[$investors],
            'message'=>'All Investors Information',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investors = User::updateOrCreate(
            [
                'id'                   =>$id,
            ],
            [
                'transaction_id'       =>$request->transaction_id,
            ]);
        if (isset($request->payment_image)){
            $this->upload_file($request->payment_image, $investors, 'payment_image', 'user/payment_image');
        }

        return response()->json([
            'status'=> true,
            'data'=>[$investors],
            'message'=>'Investor Update Successful',
        ]);
    }

    public function investorUpdate(Request $request){

        $validator = Validator::make($request->all(),[
            'id'              => 'required',
            'transaction_id'  => 'required_without:payment_image',
            'payment_image'   => 'required_without:transaction_id',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> true,
                'data'=>[],
                $validator->errors(),
                'message'=>'Update Error'
            ]);
        }

        $investors = User::updateOrCreate(
            [
                'id'                   =>$request->id,
            ],
            [
                'transaction_id'       =>$request->transaction_id,
            ]);
        if (isset($request->payment_image)){
            $this->upload_file($request->payment_image, $investors, 'payment_image', 'user/payment_image');
        }

        $token = $investors->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['status'=> true,'data'=> ['investor' => $investors ], 'access_token' => $token, 'token_type' => 'Bearer', 'message' => $investors->name.'s'.' Payments Transaction-ID & Payment-Image Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
