<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
	{
	    return view('account',['user' => \Auth::user()]);
		 return "Привет, ". \Auth::user()->name . "<br> <a href='". route('logout'). "'>Выйти</a>";
	}
}
