<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        $clinics = Clinic::get();
        return view('dashboard.services.index',compact(['services','clinics']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = Clinic::get();
        return view('dashboard.services.add',compact('clinics'));
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
            'name'                 => 'required',
        ]);

        if ($request->hasFile('image')){
            $fileNameToStore = uploadImage('services',$request->image);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $service = new Service;
        $service->name                      = $request->name;
        $service->clinic_id                 = $request->clinic_id;
        $service->image                     = $fileNameToStore;
        $service->save();

        toastr()->success('Added successfully');
        return redirect(url('dashboard/services'));
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
            $service = Service::findOrFail($id);
            if ($request->hasfile('image')) {
                $filepath = uploadImage('services',$request->image);
                $service->update([
                    'image'   => $filepath,
                ]);
            }
            $service->update([
                $service->name              = $request->name,
                $service->clinic_id         = $request->clinic_id,
            ]);
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
        toastr()->success('Edited successfully');
        return redirect(url('dashboard/services'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $service = Service::findOrFail($request->id)->delete();
        toastr()->error('Deleted successfully');
        return redirect(url('dashboard/services'));
    }
}
