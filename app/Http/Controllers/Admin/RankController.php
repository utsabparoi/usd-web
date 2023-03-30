<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rank;
use Illuminate\Http\Request;
use App\Traits\FileSaver;

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
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'name' => 'required',
            'target' => 'required',
            'reward' => 'required',
            'status' => 'required',
        ]);

        $rank = Rank::updateOrCreate(
            [
                'id' => null
            ],
            [
            'name' => $request->name,
            'target' => $request->target,
            'reward' => $request->reward,
            'status' => $request->status,
            'created_at' => now(),
         ]);
        $this->upload_file($request->image, $rank, 'image', 'upload/rank/image');
        //  $this->upload_file($request->image );
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
        $old = Rank::findOrFail($id);
        $img_url = $old->image;
        $request->validate([
            'name' => 'required',
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'target' => 'required',
            'reward' => 'required',
            'status' => 'required',
        ]);

        if($request->hasFile('image')){
            $NewsImage = public_path($old->image);
            if (file_exists($NewsImage)) { // unlink or remove previous image from folder
                unlink($NewsImage);
            }

            $file = $request->file('image');
            $new_image = hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
            $request->image->move(public_path('upload'),$new_image);
            $img_url = 'upload/' . $new_image;
        }
        Rank::findOrFail($id)->update([
            'name' => $request->name,
            'image' => $img_url,
            'target' => $request->target,
            'reward' => $request->reward,
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
