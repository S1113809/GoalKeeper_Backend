<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index(){
        $goals =  Goal::all();

        return json_encode($goals, JSON_FORCE_OBJECT);
    }
}
