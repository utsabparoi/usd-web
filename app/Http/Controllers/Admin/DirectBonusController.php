<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DirectBonus;
use Illuminate\Http\Request;

class DirectBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['directbonus_info'] = DirectBonus::latest()->get();
        return view('admin.direct_bonus.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.direct_bonus.create');
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
            'generation' => 'required',
            'percentage' => 'required',
            'status' => 'required',
        ]);
        DirectBonus::insert([
            'generation' => $request->generation,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'created_at' => now(),
            ]);
     return redirect()->route("directbonus.index")->with('message', 'Direct Bonus Added Successfully!');
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
        $data['directbonus_edit'] = DirectBonus::findOrFail($id);
        return view('admin.direct_bonus.edit',$data);
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
            'generation' => 'required',
            'percentage' => 'required',
            'status' => 'required',
        ]);
        DirectBonus::findOrFail($id)->update([
            'generation' => $request->generation,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'created_at' => now(),
         ]);
     return redirect()->route("directbonus.index")->with('message', 'Direct Bonus Updated Successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DirectBonus::destroy($id);
        return redirect()->route("directbonus.index")->with('message', 'Direct Bonus Deleted Successfully!');
    }
}
