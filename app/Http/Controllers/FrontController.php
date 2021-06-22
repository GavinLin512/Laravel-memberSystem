<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function __construct()
    {
        $this->index = 'front.contact_us.index';
    }

    public function index()
    {
        return view($this->index);
    }

    
}
