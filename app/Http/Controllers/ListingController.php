<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //display all listing
    public function index()
    {
        return view('listings.index', [
            'heading' => "Listing All JOb",
            'listings' => Listing::all()
        ]);
    }
    //display single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
