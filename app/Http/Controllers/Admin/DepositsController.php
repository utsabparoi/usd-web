<?php

namespace App\Http\Controllers\Admin;

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
        $data['deposits_info'] = Deposit::latest()->get();
        return view('admin.deposits_package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deposits_package.create');
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
        return redirect()->route("deposits.index")->with('success', 'Deposits Package Added Successfully!');
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
        $data['deposit_edit'] = Deposit::findOrFail($id);
        return view('admin.deposits_package.edit',$data);
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
        $deposit = Deposit::updateOrCreate(
            [
                'id' => $id
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
        return redirect()->route("deposits.index")->with('success', 'Deposits Package Updated Successfully!');
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

            return redirect()->route("deposits.index")->with('success','Deposits Package Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->route("deposits.index")->with('error',$th->getMessage());
        }

    }
}
