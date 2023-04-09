<?php

namespace App\Http\Controllers;

use App\Models\Admin\Transaction;
use App\Models\Admin\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['wallets'] = Wallet::with('user','walletType')->get();
        // ddd($data['wallets']);
        return view('admin.wallet.index', $data);
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
