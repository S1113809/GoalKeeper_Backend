<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
Use Validator;
Use DB;

class SubjectController extends Controller
{
    public function index(){
        $subjects =  Subject::all();

        return json_encode($subjects, JSON_FORCE_OBJECT);
    }

    public function create(Request $request){
      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'description' => 'required',
      ]);

      if($validator->fails()){
        return response()->json(['status_code'=>400, 'message'=> 'Bad Request']);
      }

      $user = new Subject();
      $user->title = $request->name;
      $user->description = $request->description;
      $user->save();

      return response()->json([
        'status_code'=>200,
        'message'=> 'subject created succesfully'
      ]);
    }
}
