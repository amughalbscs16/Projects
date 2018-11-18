<?php

namespace App\Http\Controllers;
use App\ServiceProvider, App\Provider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceProvider::orderBy('rating',desc)->take(10)->get();
        $count = count($services);
        return view('home')->with('message','')->with('$services',$services)->with('count',$count);
    }
}
