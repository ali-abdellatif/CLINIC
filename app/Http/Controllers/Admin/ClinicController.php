<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::get();
        $cities = City::get();
        return view('dashboard.clinics.index',compact(['clinics','cities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('dashboard.clinics.add',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        try{
            $validatedData = $request->validate([
                'name'                      => 'required',
                'address'                   => 'required',
                'longitude'                 => 'required',
                'latitude'                  => 'required',
                'timing_from'               => 'required',
                'timing_to'                 => 'required',
                'city_id'                   => 'required',
            ]);
            if ($request->hasFile('image')){
                $fileNameToStore = uploadImage('clinics',$request->image);
            }else {
                $fileNameToStore = 'noimage.jpg';
            }
            $clinic = new Clinic;
            $clinic->name                             = $request->name;
            $clinic->address                          = $request->address;
            $clinic->longitude                        = $request->longitude;
            $clinic->latitude                         = $request->latitude;
            $clinic->timing_from                      = $request->timing_from;
            $clinic->timing_to                        = $request->timing_to;
            $clinic->city_id                          = $request->city_id;
            $clinic->image                            = $fileNameToStore;
            $clinic->save();
            toastr()->success('Added successfully');
            return redirect(url('dashboard/clinics'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
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
            $validatedData = $request->validate([
                'name'                      => 'required',
                'address'                   => 'required',
                'longitude'                 => 'required',
                'latitude'                  => 'required',
                'timing_from'               => 'required',
                'timing_to'                 => 'required',
                'city_id'                   => 'required',
            ]);

            $clinic = Clinic::findOrFail($id);
            if ($request->hasfile('image')) {
                $filepath = uploadImage('clinics',$request->image);
                $clinic->update([
                    'image'   => $filepath,
                ]);
            }
            $clinic->update([
                $clinic->name                     = $request->name,
                $clinic->address                  = $request->address,
                $clinic->longitude                = $request->longitude,
                $clinic->latitude                 = $request->latitude,
                $clinic->timing_from              = $request->timing_from,
                $clinic->timing_to                = $request->timing_to,
                $clinic->city_id                  = $request->city_id,
            ]);

            toastr()->success('Added successfully');
            return redirect(url('dashboard/clinics'));
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $clinic = Clinic::findOrFail($request->id)->delete();
        toastr()->error('Deleted successfully');
        return redirect(url('dashboard/clinics'));
    }
}
