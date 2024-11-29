<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChirpController extends Controller
{
    // public function index(): Response
    public function index(): View
    {
        return view('chirps', [
            
        ]);
    }
}
