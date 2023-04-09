<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;

class ListingController extends Controller
{
    //display all listing
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }
    //display single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    //create post

    public function create()
    {
        return view('listings.create');
    }
//store data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasfile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully');
    }


    //Editing gig
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate(
            [
                'title' => 'required',
                'company' => ['required'],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required',
            ]
        );

        if ($request->hasfile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $listing->update($formFields);
        return back()->with('message', 'Listing Updated Successfully');
    }

    //deleting listing
    public function delete(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted Successfully');
    }
}
