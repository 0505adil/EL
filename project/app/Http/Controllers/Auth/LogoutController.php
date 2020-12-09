<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
   	public function submit(Request $request) {
   		Auth::logout();
  		return redirect('login');
   	}
}
