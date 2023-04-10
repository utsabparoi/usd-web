<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deposit;
use Illuminate\Http\Request;
use App\Traits\FileSaver;
class DepositsController extends Controller
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
            'Deposit' =>Deposit::get()
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
            'package_price' => 'required',
            'deposit_amount' => 'required',
            'monthly_profit' => 'required',
            'total_payable' => 'required',
            'distribute_amount' => 'required',
            'status' => 'required',
        ]);

        $deposit = Deposit::updateOrCreate(
            [
                'id' => null
            ],
            [
            'name' => $request->name,
            'package_price' => $request->package_price,
            'deposit_amount' => $request->deposit_amount,
            'monthly_profit' => $request->monthly_profit,
            'total_payable' => $request->total_payable,
            'distribute_amount' => $request->distribute_amount,
            'status' => $request->status,
            'created_at' => now(),
         ]);
        $this->upload_file($request->image, $deposit, 'image', 'upload/deposit/image');
        return response()->json([
            'message' => 'Deposits Package Added Successfully!',
            'status' => 'success',
            'data' =>$deposit,
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
        $data =  Deposit::findOrFail($id);
        if($data){
            return response()->json([
                'status'=>true,
                'data'=>$data,
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Deposit Package Not Found',
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
            'package_price' => 'required',
            'deposit_amount' => 'required',
            'monthly_profit' => 'required',
            'total_payable' => 'required',
            'distribute_amount' => 'required',
            'status' => 'required',
        ]);

        $deposit = Deposit::updateOrCreate(
            [
                'id' => null
            ],
            [
            'name' => $request->name,
            'package_price' => $request->package_price,
            'deposit_amount' => $request->deposit_amount,
            'monthly_profit' => $request->monthly_profit,
            'total_payable' => $request->total_payable,
            'distribute_amount' => $request->distribute_amount,
            'status' => $request->status,
            'created_at' => now(),
         ]);
        $this->upload_file($request->image, $deposit, 'image', 'upload/deposit/image');
        return response()->json([
            'message' => 'Deposits Package Updated Successfully!',
            'status' => 'success',
            'data' =>$deposit,
        ]);
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
            $deposit = Deposit::find($id);

            if(file_exists($deposit->image)){
                unlink($deposit->image);
            }
            $deposit->delete();

            return redirect()->back()->with('success','Package Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }

    }
}
