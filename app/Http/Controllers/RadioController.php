<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use BrowserDetect;

class RadioController extends Controller
{
    public function index()
	{
		$view = BrowserDetect::isMobile() ? 'radio.mobile' : 'radio.desktop';
		$radio = 'http://119.82.232.83:1111/;stream.mp3';
		return view($view, [
			'radio' => $radio,
			// 'data' => file_get_contents($radio)
		]);
	}
}
