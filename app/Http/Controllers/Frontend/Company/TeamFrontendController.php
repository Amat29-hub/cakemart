<?php

namespace App\Http\Controllers\Frontend\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamFrontendController extends Controller
{
    public function index(){
        return view('page.frontend.company.team.index');
    }
}
