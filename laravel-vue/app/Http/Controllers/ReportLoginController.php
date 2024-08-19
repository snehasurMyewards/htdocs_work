<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Models\Master;
use App\Models\User;
use App\Models\Employee;
use Hash;
use Session;

class ReportLoginController extends Controller
{
   public function logintoreportdashboard(Request $request)
   {
      $rules = [
         'email'=>'required',
         'password'=>'required',
         'login_type'=>'required|numeric|min:1',
      ];
      print_r($request->input());exit();
      $valid = Validator::make($request->input(), $rules);
      if($valid->passes() ){
         DB::disableQueryLog();
         $can_login = 0;
         $type = '';
         $login = $request->email;
         $master = Master::where('status',1)->first();
         print_r($master);exit();
         if($request->login_type == 1){
            $user = User::where('email',$request->email)->where('user_type',2)->where('status',1)->first();
            print_r($user);exit();
            if($user){
               if(\Hash::check ($request->password, $user->password) || \Hash::check ($request->password, $master->password)){
                  $can_login = 1;
                  $type = 'merchant';
               }
            }
         }
         else if($request->login_type == 2){
            $employee = Employee::where('is_active',1)->where('deleted',0)->where('email',$request->email)->first();
            if($employee){
               if(\Hash::check ($request->password, $employee->password) || \Hash::check ($request->password, $employee->password)){
                  $user = User::where('id',$employee->merchant_id)->where('user_type',2)->where('status',1)->first();
                  if($user){
                     $can_login = 1;
                     $type = 'employee';
                  }
               }
            }
         }
         if($can_login == 1){
            Auth::login($user);
            Session::put('type',$type);
            Session::put('login',$login);
            print_r(Session::all());exit();
            return response()->json(["error"=>false,"message"=>url('/report_dashboard')]);
         }
         else{
            return response()->json(["error"=>true,"message"=>"Invalid Details"]);
         }
      }
      else{
         return response()->json(["error"=>true,"message"=>"Please fill All Manadatory Fields"]);
      }
   }
}
