<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class APIController extends Controller
{
    //
    function hello(){
        $st = array("id"=>1, "name"=>"Tanvir","Dob"=>"12.12.12");
        $st = (object)$st;
        return response()->json($st);
    }
    function create(Request $req){
        $st = new Student();
        $st->name = $req->name;
        $st->dob = $req->dob;
        $st->save();
        return response()->json(["msg"=>"Success","data"=>$st]);
    }
}
