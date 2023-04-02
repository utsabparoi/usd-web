<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\DirectBonus;
use Illuminate\Http\Request;

class DirectBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'directBonus' =>DirectBonus::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'generation' => 'required',
            'percentage' => 'required',
            'status' => 'required',
        ]);
        $data = DirectBonus::insert([
            'generation' => $request->generation,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'created_at' => now(),
            ]);
            return response()->json([
                'message' => 'Direct Bonus Added Successfully',
                'status' => 'success',
                'data' =>$data,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =  DirectBonus::findOrFail($id);
        if($data){
            return response()->json([
                'status'=>true,
                'data'=>$data,
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Direct Bonus Not Found',
            ],404);
        }
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
        $request->validate([
            'generation' => 'required',
            'percentage' => 'required',
            'status' => 'required',
        ]);
        $data = DirectBonus::findOrFail($id)->update([
            'generation' => $request->generation,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'created_at' => now(),
         ]);
        
            if($data){
                return response()->json([
                    'status'=>true,
                    'message'=>'Direct Bonus Updated Successfully',
                    'data'=>$data,
                ],200);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Direct Bonus Not Found',
                ],404);
            }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete_direct = DirectBonus::destroy($id);
        return response()->json([
            'message' => 'Direct Bonus Deleted Successfully',
            'status' => 'success',
            'data' =>$delete_direct,
        ]);
           
    }
}
