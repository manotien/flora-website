<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Location;

class IndexController extends Controller
{
    public function index(){
		$location = Location::all();
		return view('index')->with('location',$location);
	}
}
