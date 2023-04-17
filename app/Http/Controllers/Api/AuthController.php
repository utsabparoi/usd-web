<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Deposit;
use App\Models\Admin\DepositPlanModel;
use App\Models\Admin\UserDeposit;
use App\Models\Admin\UserDepositInstallmentModel;
use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
// use Auth;
// use Validator;
class AuthController extends Controller
{
    use FileSaver;

    public function register(Request $request, $id=null)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users',
                'mobile'   => 'required|string|min:11|unique:users',
                'password' => 'required|string|min:8',
                ]);
            if($validator->fails()){
                return response()->json($validator->errors());
            }

            $deposit_plan = DepositPlanModel::find($request->deposit_plan);
            $investors = User::updateOrCreate([
                'id'                   =>$id,
            ],[
                'name'                 =>$request->name,
                'email'                =>$request->email,
                'mobile'               =>$request->mobile,
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
            $date = Carbon::now();
            for ($i = 0; $i < $user_deposit_plan->total_installment; $i++){
                UserDepositInstallmentModel::updateOrCreate(
                    [
                        'id'                    =>null,
                    ],
                    [
                        'user_deposit_plan_id'  =>$user_deposit_plan->id,
                        'deposit_plan_id'       =>$deposit_plan->id,
                        'month'                 =>$date->addMonth()->format('M, Y'),
                        'is_paid'               =>0,
                        'amount'                =>$user_deposit_plan->monthly_profit,
                        'status'                =>$request->status ? 1: 0,
                    ]);
            }

            $token = $investors->createToken('auth_token')->plainTextToken;

            return response()
                ->json(['investor' => $investors, 'user_deposit_plan' => $deposit_plan, 'access_token' => $token, 'token_type' => 'Bearer', ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function deposit_plans(){
        $deposit_plans = DepositPlanModel::all();
        return response()->json([
            $deposit_plans,
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'    => 'required_without:mobile',
            'mobile'   => 'required_without:email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if (isset($request->email)){
            if (Auth::attempt($request->only('email', 'password','mobile') + ['is_admin' => 2]))
            {
                $user = User::where('is_admin', 2)->where('email', $request['email'])->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
            }
        }
        elseif (isset($request->mobile)){
            if (Auth::attempt($request->only('email', 'password','mobile') + ['is_admin' => 2]))
            {
                $user = User::where('is_admin', 2)->where('mobile', $request['mobile'])->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
            }
        }

        return response()
            ->json(['message' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
