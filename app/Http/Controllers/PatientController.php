<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Model\Commune;
use App\Model\Patient;
use App\Model\Provice;
use App\Model\Village;
use App\Model\District;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        return view('patient.index');
    }

    public function create(){
        $provices = Provice::orderBy('name','asc')->get();
        return view('patient.create', compact('provices'));
    }

    public function proviceAjax($province_id){
        $data = District::where('province_id',$province_id)->orderBy('name','asc')->get();
        //dd($district);
        return json_encode($data);
    }

    public function districtAjax($district_id){
        $data = Commune::where('district_id',$district_id)->orderBy('name','asc')->get();
        return json_encode($data);
    }

     public function communeAjax($commune_id){
        $data = Village::where('commune_id',$commune_id)->orderBy('name','asc')->get();
        return json_encode($data);
    }

    // 
    public function storePatient(Request $request){
        // dd($request->all());
        // $user = User::get();
        // dd($user);
        //  User::insert([
        //     'name' => @$request->name,
        //     'email' => @$request->email,
        //     'phone' => @$request->phone,
        //     'noted' => @$request->noted,
        //     'commune_id' => @$request->commune_id,
        //     'district_id' => @$request->district_id,
        //     'province_id' => @$request->province_id,
        //     'villages_id' => @$request->villages_id,
        //     'created_at' => Carbon::now(),
        // ]);

        $user = new Patient();
      
        $user->name =  @$request->name;
        $user->email =  @$request->email;
        $user->phone =  @$request->phone;
        $user->noted =  @$request->noted;
        $user->commune_id =  @$request->commune_id;
        $user->district_id =  @$request->district_id;
        $user->province_id =  @$request->province_id;
        $user->villages_id =  @$request->village_id; // village_id request from input
        $user->created_at =  Carbon::now();
        $user->save();

        return redirect(route('patient.index'))->with('status','Inserted Successfully.');
    }

    


}
