<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects =  Subject::all();

        return json_encode($subjects, JSON_FORCE_OBJECT);
    }
}
