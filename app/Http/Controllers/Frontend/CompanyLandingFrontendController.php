<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Service;
use App\Models\TenagaKerja;
use App\Models\Testimonial;

class CompanyLandingFrontendController extends Controller
{
    public function index(){

        //hero
        $activeHeros = Hero::where('is_active', 1)->first();
        $activeAbout = Aboutus::where('is_active', 1)->first();
        $activeService = Service::where('is_active', 1)->get();
        $activeTestimoni = Testimonial::where('is_active', 1)->get();
        $activeTeam = TenagaKerja::where('is_active', 1)->get();


        return view('page.frontend.company.landing.index', compact('activeHeros', 'activeAbout', 'activeService', 'activeTestimoni', 'activeTeam'));
    }
}
