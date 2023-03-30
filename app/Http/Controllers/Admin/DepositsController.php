<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deposit;
use Illuminate\Http\Request;

class DepositsController extends Controller
{
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
            'name' => 'required',
            'package_price' => 'required',
            'deposit_amount' => 'required',
            'monthly_profit' => 'required',
            'converted_amount' => 'required',
            'distribut_amount' => 'required',
            'status' => 'required',
        ]);
        Deposit::insert([
            'name' => $request->name,
            'package_price' => $request->package_price,
            'deposit_amount' => $request->deposit_amount,
            'monthly_profit' => $request->monthly_profit,
            'converted_amount' => $request->converted_amount,
            'distribut_amount' => $request->distribut_amount,
            'status' => $request->status,
            'created_at' => now(),
         ]);
     return redirect()->route("deposits.index")->with('message', 'Deposits Package Added Successfully!');
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
        $request->validate([
            'name' => 'required',
            'package_price' => 'required',
            'deposit_amount' => 'required',
            'monthly_profit' => 'required',
            'converted_amount' => 'required',
            'distribut_amount' => 'required',
            'status' => 'required',
        ]);
        Deposit::findOrFail($id)->update([
            'name' => $request->name,
            'package_price' => $request->package_price,
            'deposit_amount' => $request->deposit_amount,
            'monthly_profit' => $request->monthly_profit,
            'converted_amount' => $request->converted_amount,
            'distribut_amount' => $request->distribut_amount,
            'status' => $request->status,
            'created_at' => now(),
         ]);
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
        Deposit::destroy($id);
        return redirect()->route("deposits.index")->with('message', 'Deposits Package Deleted Successfully!');
    }
}
