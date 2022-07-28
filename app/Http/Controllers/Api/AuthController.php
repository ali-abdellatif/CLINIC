<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassPatient;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:class_patients,email',
            'password' => 'required',
            'phone' => 'required|unique:class_patients,phone',
            //'address' => 'required',
            //'firebase_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $patient = ClassPatient::create(array_merge(
            $validator->validated(),
            [
                'password'          => bcrypt($request->password),
                'name'              => $request->name,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'gender'            => $request->gender,
                ]
        ));
        return $this->returnData('data',$patient,'success');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            //'firebase_id' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // return $this->returnData('data',$request->all(),'success');
        $credentials = $request->only(['phone','password','email']);
        if (Auth::guard('patients')->attempt(['phone'=>$request->phone,'password'=>$request->password])){
            $token = Auth::guard('patients')->attempt($credentials);
            if (!$token){
                return response()->json($validator->errors(), 422);
            }

//            $input['firebase_id'] = $request->firebase_id;
//            $firebase = ClassPatient::find(Auth::guard('patients')->user()->id);
//            $firebase->update($input);
            $user = Auth::guard('patients')->user();
            $data['id']= $user->id;
            $data['name']= $user->name;
            $data['email']= $user->email;
            $data['phone']= $user->phone;
            $data['token']=$token;
            return $this->returnData('data',$data,'success');
        }
    }


    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function userProfile()
    {
        $user = auth('api')->user();
        $data['id']= $user->id;
        $data['name']= $user->name;
        $data['email']= $user->email;
        $data['phone']= $user->phone;
        $data['avatar']= $user->avatar;
        return $this->returnData('data',$data,'success');

    }

    public function editProfile(Request $request)
    {
        $patient = ClassPatient::findOrFail($request->id);
        $filePath = $patient->avatar;
        if ($request->has('avatar')) {
            $filePath = uploadImage('patients', $request->avatar);
        }
        $patient->update([
            'name'                    =>      $request->name,
            'email'                   =>      $request->email,
            'phone'                   =>      $request->phone,
            'avatar'                  =>      $filePath,
        ]);
        return $this->returnSuccessMessage('تم التعديل بنجاح');

    }
}
