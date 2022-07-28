<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view('dashboard.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image'               => 'required',
        ]);


        if ($request->hasFile('image')){
            $fileNameToStore = uploadImage('banners',$request->image);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $banner = new Banner;
        $banner->image = $fileNameToStore;
        $banner->save();
        toastr()->success('Added successfully');
        return redirect(url('dashboard/banners'));
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
        try{
            $banner = Banner::findOrFail($id);
            if ($request->hasfile('image')) {
                $filepath = uploadImage('banners',$request->image);
                $banner->update([
                    'image'   => $filepath,
                ]);
            }
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        toastr()->success('Edited successfully');
        return redirect(url('dashboard/banners'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $banner = Banner::findOrFail($request->id)->delete();
        toastr()->error('Deleted successfully');
        return redirect(url('dashboard/banners'));
    }
}
