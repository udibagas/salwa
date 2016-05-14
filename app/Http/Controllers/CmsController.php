<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CmsController extends Controller
{
    public function index()
	{
		return view('layouts.cms-dashboard');
	}
}
