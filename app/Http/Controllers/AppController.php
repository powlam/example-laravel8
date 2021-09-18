<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }
}
