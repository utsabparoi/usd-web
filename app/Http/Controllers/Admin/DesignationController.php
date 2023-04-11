<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['designations'] = Designation::paginate(20);
        return view('admin.designation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.designation.create');
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
        return redirect()->route('designations.index')->with('success', 'Designation Created Successfully');
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
        return view('admin.designation.edit', $data);
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
        $this->storeOrUpdate($request, $id);
        return redirect()->route('designations.index')->with('success', 'Designation Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = Designation::find($id);
        $designation->delete();
        return redirect()->route('designations.index')->withMessage('Designation Successfully Deleted!');
    }

    public function storeOrUpdate($request, $id = null)
    {
        try {
            $designation = Designation::updateOrCreate([
                'id'            =>$id,
            ],[
                'name'          =>$request->name,
                'code'          =>$request->code,
                'status'        =>$request->status ? 1: 0,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
