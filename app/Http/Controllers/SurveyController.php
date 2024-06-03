<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(){
        return redirect('https://form.jotform.com/232556741230855');
    }
}
