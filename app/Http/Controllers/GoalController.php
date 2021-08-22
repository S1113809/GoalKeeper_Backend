<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Validator;

class GoalController extends Controller
{
    public function index(){
        $goals =  Goal::all();

        return json_encode($goals, JSON_FORCE_OBJECT);
    }

    public function create(Request $request){
      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'description' => 'required',
        'endDate' => 'required',
        'steps' => 'required',
        'subject_id' => 'required'
      ]);

      if($validator->fails()){
        return response()->json(['status_code'=>400, 'message'=> 'Bad Request']);
      }

      $goal = new Goal();
      $goal->name = $request->name;
      $goal->email = $request->email;
      $goal->password = bcrypt($request->password);
      $goal->save();

      return response()->json([
        'status_code'=>200,
        'message'=> 'user created succesfully'
      ]);
    }
}
