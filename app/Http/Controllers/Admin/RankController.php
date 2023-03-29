<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rank_info'] = Rank::latest()->get();
        return view('admin.rank.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rank.create');
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
            'rank_name' => 'required',
            'target' => 'required',
            'reward' => 'required',
            'status' => 'required',
        ]);

        Rank::insert([
            'rank_name' => $request->rank_name,
            'target' => $request->target,
            'reward' => $request->reward,
            'status' => $request->status,
            'created_at' => now(),
         ]);
     return redirect()->route("rank.index")->with('message', 'Rank Added Successfully!');
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
            'rank_name' => 'required',
            'target' => 'required',
            'reward' => 'required',
            'status' => 'required',
        ]);
        Rank::findOrFail($id)->update([
            'rank_name' => $request->rank_name,
            'target' => $request->target,
            'reward' => $request->reward,
            'status' => $request->status,
            'created_at' => now(),
         ]);
     return redirect()->route("rank.index")->with('message', 'Rank Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rank::destroy($id);
        return redirect()->route("rank.index")->with('message', 'Rank Deleted Successfully!');
    }
}
