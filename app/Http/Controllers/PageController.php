<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        // tutta la logica
        $listings = Listing::all();


        // ritorniamo una vista
        return view('guest.home', [
            'listings'  => $listings,
        ]);
    }
}
