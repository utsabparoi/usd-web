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
use function MongoDB\BSON\toJSON;

// use Auth;
// use Validator;
class AuthController extends Controller
{
    use FileSaver;

    public function register(Request $request, $id=null)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name'         => 'required',
                'email'        => 'required|unique:users',
                'mobile'       => 'required|unique:users',
                'password'     => 'required',
                'deposit_plan' => 'required',
                ]);
            $nameValidation = $validator->errors()->get('name');
            $emailValidation = $validator->errors()->get('email');
            $mobileValidation = $validator->errors()->get('mobile');
            $passwordValidation = $validator->errors()->get('password');
            $depositPlanValidation = $validator->errors()->get('deposit_plan');
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'data' => [],
                    'message' => join($nameValidation+$emailValidation+$mobileValidation+$passwordValidation+$depositPlanValidation),
                ]);
            }

            $deposit_plan = DepositPlanModel::find($request->deposit_plan);

            if (isset($deposit_plan)){
                $investors = User::updateOrCreate([
                    'id'                   =>$id,
                ],[
                    'name'                 =>$request->name,
                    'email'                =>$request->email,
                    'mobile'               =>$request->mobile,
                    'password'             =>Hash::make($request->password),
                    'refer_by'             =>$request->refer_by,
                    'is_admin'             =>2,
                    'status'               =>$request->status ? 1: 0,
                ]);
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
                    ->json(['status'=> true,'data'=> ['investor' => $investors, 'user_deposit_plan' => $deposit_plan], 'access_token' => $token, 'token_type' => 'Bearer', 'Approval Status' => 'Not Approved', 'message' => 'Registration Success']);
            }
            else{
                return response()
                    ->json(['status'=> false,'data'=>[], 'Message'=>'Select a valid deposit plan']);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function deposit_plans(){
        $deposit_plans = DepositPlanModel::all();
        return response()->json([
            'status'=> true,
            'data' => $deposit_plans,
            'message' => 'ALl Deposit Plans'
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
            return response()->json([
                'status' => false,
                'data' => [],
                $validator->errors(),
                'message' => 'Validation Required',
                ]);
        }

        if (isset($request->email)){
            if (Auth::attempt($request->only('email', 'password','mobile') + ['is_admin' => 2]))
            {
                $user = User::where('is_admin', 2)->where('email', $request['email'])->firstOrFail();
                $userDepositPlan = UserDeposit::where('user_id', $user->id)->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['status'=> true, 'data' => ['investor'=>$user, 'user deposit plan'=>$userDepositPlan, 'access_token' => $token, 'token_type' => 'Bearer'  ], 'message' => 'Hi '.$user->name.', welcome to Red-USD',]);
            }
        }
        elseif (isset($request->mobile)){
            if (Auth::attempt($request->only('email', 'password','mobile') + ['is_admin' => 2]))
            {
                $user = User::where('is_admin', 2)->where('mobile', $request['mobile'])->firstOrFail();
                $userDepositPlan = UserDeposit::where('user_id', $user->id)->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['status'=> true, 'data' => ['investor'=>$user, 'user deposit plan'=>$userDepositPlan, 'access_token' => $token, 'token_type' => 'Bearer',], 'message' => 'Hi '.$user->name.', welcome to Red-USD',  ]);
            }
        }


        $email = User::where('email', $request->email)->count();
        $mobile = User::where('mobile', $request->mobile)->count();
        $password = User::where('password', $request->password)->count();

        if (isset($request->email)){
            if ($email != 1){
                return response()->json([
                    'status' => false,
                    'data' =>[],
                    'message' => 'Email incorrect'
                ],
                    401
                );
            }
        }
        if (isset($request->mobile)){
            if ($mobile != 1){
                return response()->json([
                    'status' => false,
                    'data' =>[],
                    'message' => 'Mobile number incorrect'
                ],
                    401
                );
            }
        }
        if (isset($request->password)){
            if ($password != 1){
                return response()->json([
                    'status' => false,
                    'data' =>[],
                    'message' => 'Password incorrect'
                ],
                    401
                );
            }
        }
    }

    public function referCheck(Request $request){
        $validator = Validator::make($request->all(),[
            'refer'    => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'data' => [],
                $validator->errors(),
                'message' => 'Validation Required',
            ]);
        }
        $referCheck = User::where('is_admin', 2)->where('approval', 1)->find($request->refer);
        if (isset($referCheck)){
            return response()->json([
                'status' => true,
                'data' =>$referCheck,
                'message' => 'Refer code is valid!'
            ],
                401
            );
        }
        else{
            return response()->json([
                'status' => false,
                'data' =>[],
                'message' => 'Refer code is invalid'
            ],
                401
            );
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'data' =>[],
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ],
            401
        );
    }
}
