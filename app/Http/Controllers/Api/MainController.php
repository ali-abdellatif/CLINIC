<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Models\City;
use App\Models\ClassDoctor;
use App\Models\Clinic;
use App\Models\DoctorSchedule;
use App\Models\Facilitie;
use App\Models\Offer;
use App\Models\Service;
use App\Models\SubService;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class MainController extends Controller
{
    use GeneralTrait;
    public function allDoctors()
    {
        $doctors = ClassDoctor::where('is_active',1)->get();
        return $this->returnData('data',$doctors,'success');
    }

    public function doctorSchedule(Request $request)
    {
        $doctorSchedule =DoctorSchedule::where('class_doctors_id',$request->doctor_id)->get();
        return $this->returnData('data',$doctorSchedule,'success');
    }

    public function homePage(Request $request)
    {
        $data = [
            'offers'                => Offer::get(),
            'cities'                => City::get(),
            'clinics'               => Clinic::where('city_id',$request->city_id)->get(),
            'banners'               => BannerResource::collection(Banner::get()),
        ];
        return $this->returnData('data',$data,'success');

    }

    public function clinic(Request $request)
    {
        $data = [
            'clinic'                        => Clinic::where('id',$request->clinic_id)->get(),
            'facilities'                    => Facilitie::where('clinic_id',$request->clinic_id)->get(),
            'services'                      => Service::where('clinic_id',$request->clinic_id)->get(),
            //'sub-services'                  => SubService::where('clinic_id',$request->clinic_id)->get(),
        ];
        return $this->returnData('data',$data,'success');
    }


    public function subService(Request $request)
    {
        $subService = SubService::where('service_id',$request->service_id)->get();
        return $this->returnData('data', $subService ,'success');
    }
}
