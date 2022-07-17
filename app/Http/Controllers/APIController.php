<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    //
    function list(){
        $sts = Student::all();
        return response()->json($sts);
    }
    function hello(){
        $st = array("id"=>1, "name"=>"Tanvir","Dob"=>"12.12.12");
        $st = (object)$st;
        return response()->json($st);
    }
    function create(Request $req){
        $validator = Validator::make($req->all(),[
            "name"=>"required",
            "dob"=>"required"
        ],[
            "name.required"=>"Please provide name"
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $st = new Student();
        $st->name = $req->name;
        $st->dob = $req->dob;
        $st->save();
        return response()->json(["msg"=>"Success","data"=>$st]);
    }
}
