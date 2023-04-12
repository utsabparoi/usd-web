<?php

namespace App\Http\Controllers;

use App\Models\Admin\Transaction;
use App\Models\Admin\Wallet;
use App\Models\Admin\WalletType;
use App\Models\User;
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
        $data['user_wallets'] = User::where('is_admin',2)->with('wallet')->get();
        $data['invests'] = WalletType::where('id', 1)->value('name');
        $data['incomes'] = WalletType::where('id', 2)->value('name');

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
