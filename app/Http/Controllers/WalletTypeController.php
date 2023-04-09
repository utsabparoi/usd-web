<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\WalletType;
use App\Models\Admin\WalletType as AdminWalletType;

class WalletTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['wallet_types'] = WalletType::get();
        return view('admin.wallet-type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wallet-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->storeOrUpdate($request);
            return redirect()->route('wallet_types.index')->with('success','Added Success');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletType  $walletType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletType  $walletType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['wallet_type'] = WalletType::findOrFail($id);
        return view('admin.wallet-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WalletType  $walletType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->storeOrUpdate($request,$id);
            return redirect()->route('wallet_types.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletType  $walletType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $walletType = WalletType::find($id);
        $walletType->delete();

        return redirect()->route('wallet_types.index');
    }

    private function storeOrUpdate($request, $id = null)
    {
        try {
            WalletType::updateOrCreate([
                'id'             => $id,
            ],[
                'name'          => $request->name,
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
