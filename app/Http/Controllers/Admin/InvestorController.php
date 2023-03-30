<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['investors'] = User::where('type', 2)->paginate(20);
        return view('admin.investor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $data['referBy'] = User::query()
//            ->when(request()->filled('refer_by'), fn ($q) => $q->where('id', request('refer_by')))
//            ->get();
        return  view('admin.investor.create');
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

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $investors = User::updateOrCreate([
                'id'                   =>$id,
            ],[
                'name'                 =>$request->name,
                'email'                =>$request->email,
                'mobile'               =>$request->phone,
                'password'             =>$request->password,
                'refer_by'             =>$request->refer_by,
                'type'                 =>2,
                'status'               =>$request->status ? 1: 0,
            ]);
            if (!isset($request->refer_by)){
                User::where('id', $investors->id)->update(['refer_by' => $investors->id]);
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function referCheck(Request $request){
        $refer_check = User::find($request->input('Refer_by'));
        return response()->json($refer_check);
    }
}
