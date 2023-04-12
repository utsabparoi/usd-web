<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DirectBonus;
use App\Models\Admin\UserDeposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['investors'] = User::where('is_admin', 2)->paginate(20);
        return view('admin.invest.index', $data);
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
        //
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

    function InvestApprovalChange(Request $request){
        $id = $request->input("ID");
        $invest_approval = User::where("id", "=", $id )->first()->approval;
        $amount = UserDeposit::where("user_id", "=", $id)->first()->deposit_amount;
        if ($invest_approval == 1){
            User::where("id", "=", $id)->update(["approval"=>"0"]);
            onTransaction($id, $amount, 'out', '1');
        }
        elseif ($invest_approval == 0){
            User::where("id", "=", $id)->update(["approval"=>"1"]);
            onTransaction($id, $amount, 'in', '1');
            if ($id != User::find($id)->refer_by){
                refersCommission($id, $amount);
            }
            Alert::success('Approved','Investor now approved');
        }
        return $id;
    }
}
