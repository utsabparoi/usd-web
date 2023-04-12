<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DepositPlanModel;
use App\Models\admin\UserDepositInstallmentModel;
use App\Traits\FileSaver;
use App\Models\Admin\Deposit;
use App\Models\Admin\Designation;
use App\Models\Admin\UserDeposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InvestorController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['investors'] = User::where('is_admin', 2)->paginate(20);
        return view('admin.investor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['deposit_plans'] = DepositPlanModel::all();
        return  view('admin.investor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeOrUpdate($request);
        return redirect(route('investors.index'));
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
        $data['designation'] = Designation::find($id);
        return view('admin.designation.edit');
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
        $investor = User::find($id);
        if(file_exists($investor->payment_image))
        {
            unlink($investor->payment_image);
        }
        $investor->delete();
        return redirect()->route('investors.index')->withMessage('Investor Successfully Deleted!');
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $deposit_plan = DepositPlanModel::find($request->deposit_plan);
            $investors = User::updateOrCreate([
                'id'                   =>$id,
            ],[
                'name'                 =>$request->name,
                'email'                =>$request->email,
                'mobile'               =>$request->phone,
                'password'             =>Hash::make($request->password),
                'refer_by'             =>$request->refer_by,
                'transaction_id'       =>$request->transaction_id,
                'is_admin'             =>2,
                'status'               =>$request->status ? 1: 0,
            ]);
            if (isset($request->payment_image)){
                $this->upload_file($request->payment_image, $investors, 'payment_image', 'user/payment_image');
            }
            if (!isset($request->refer_by)){
                User::where('id', $investors->id)->update(['refer_by' => $investors->id]);
            }

            $user_deposit_plan = UserDeposit::updateOrCreate([
                'id'                    =>$id,
            ],[
                'user_id'               =>$investors->id,
                'name'                  =>$deposit_plan->name,
                'image'                 =>$deposit_plan->image,
                'package_price'         =>$deposit_plan->package_price,
                'deposit_amount'        =>$deposit_plan->deposit_amount,
                'monthly_profit'        =>$deposit_plan->monthly_profit,
                'distribute_amount'     =>$deposit_plan->distribute_amount,
                'total_installment'     =>$deposit_plan->total_installment,
                'status'                =>1,
            ]);
            for ($i = 0; $i < $user_deposit_plan->total_installment; $i++){
                UserDepositInstallmentModel::updateOrCreate(
                    [
                        'id'                    =>null,
                    ],
                    [
                        'user_deposit_plan_id'  =>$user_deposit_plan->id,
                        'deposit_plan_id'       =>$deposit_plan->id,
                        'month'                 =>date('M'),
                        'is_paid'               =>0,
                        'amount'                =>$user_deposit_plan->monthly_profit,
                        'status'                =>$request->status ? 1: 0,
                    ]);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function referCheck(Request $request){
        $refer_check = User::where('is_admin', 2)->find($request->input('Refer_by'));
        return response()->json($refer_check);
    }
}
