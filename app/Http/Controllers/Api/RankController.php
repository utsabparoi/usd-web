<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rank;
use Illuminate\Http\Request;
use App\Traits\FileSaver;
class RankController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'ranks' =>Rank::get()
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
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'name' => 'required',
            'target' => 'required',
            'reward' => 'required',
            'status' => 'required',
        ]);

        $rank = Rank::updateOrCreate(
            [
                'id' => null
            ],
            [
            'name' => $request->name,
            'target' => $request->target,
            'reward' => $request->reward,
            'status' => $request->status,
            'created_at' => now(),
         ]);
        $this->upload_file($request->image, $rank, 'image', 'upload/rank/image');
        //  $this->upload_file($request->image );
        return response()->json([
            'message' => 'Rank Added Successfully',
            'status' => 'success',
            'data' =>$rank,
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

        // return response()->json(['rank' =>$id]);
        $data =  Rank::findOrFail($id);
        if($data){
            return response()->json([
                'status'=>true,
                'data'=>$data,
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Rank Not Found',
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
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'name' => 'required',
            'target' => 'required',
            'reward' => 'required',
            'status' => 'required',
        ]);
         
        $rank = Rank::updateOrCreate(
            [
                'id' => $id
            ],
            [
            'name' => $request->name,
            'target' => $request->target,
            'reward' => $request->reward,
            'status' => $request->status,
            'created_at' => now(),
         ]);
        $this->upload_file($request->image, $rank, 'image', 'upload/rank/image');
        //  $this->upload_file($request->image );
        if($rank){
            return response()->json([
                'status'=>true,
                'message'=>'Rank Updated Successfully',
                'data'=>$rank,
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Rank Not Found',
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
        try {
            $rank = Rank::find($id);
            if(file_exists($rank->image)){
                unlink($rank->image);
            }
            $rank->delete();

            return response()->json([
                'message' => 'Rank Deleted Successfully',
                'status' => 'success',
                'data' =>$rank,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Rank Deleted Successfully',
                'status' => 'success',
                'data' =>$th,
            ]);
            // return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
