<?php

namespace App\Http\Controllers\Admin;

use App\Traits\FileSaver;
use App\Models\Admin\Rank;
use Illuminate\Http\Request;
use App\Models\Admin\Position;
use App\Models\Admin\Designation;
use App\Models\Admin\Transaction;
use App\Http\Controllers\Controller;

class RankController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rank_info'] = Rank::with('designation')->get();
        return view('admin.rank.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['designations'] = Designation::where('status', 1)->get();
        return view('admin.rank.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $request->validate([
            'name' => 'required',
            'target_amount' => 'required',
            'reward_amount' => 'required',
        ]);

        $rank = Rank::updateOrCreate(
            [
                'id' => null
            ],
            [
            'name' => $request->name,
            'target_amount' => $request->target_amount,
            'reward_amount' => $request->reward_amount,
            'designation_id' => $request->designation_id,
            'status' => $request->status,
            'created_at' => now(),
         ]);

     return redirect()->route("rank.index")->with('success', 'Rank Added Successfully!');
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
        $data['rank_edit'] = Rank::findOrFail($id);
        $data['designations'] = Designation::where('status', 1)->get();

        return view('admin.rank.edit',$data);
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
            'target_amount' => 'required',
            'reward_amount' => 'required',
        ]);

        $rank = Rank::updateOrCreate(
            [
                'id' => $id
            ],
            [
            'name' => $request->name,
            'target_amount' => $request->target_amount,
            'reward_amount' => $request->reward_amount,
            'designation_id' => $request->designation_id,
            'status' => $request->status,
            'created_at' => now(),
         ]);
     return redirect()->route("rank.index")->with('success', 'Rank Updated Successfully!');
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
            $rank = Rank::find($id);
            if(file_exists($rank->image)){
                unlink($rank->image);
            }
            $rank->delete();

            return redirect()->back()->with('success','Rank Deleted Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
}
