<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\User;

class ListingsController extends Controller
{
    // show all listings with search and tag filter and also pagination
    public function index()
    {
        return view('home', [
            'heading' => 'Latest Listings',
            'listingArray' => Listing::latest()
                ->filter(request(['tag', 'search']))
                ->simplePaginate(3),
        ]);
    }

    // show single listing
    public function showSingle(Listing $listing)
    {
        return view('singleListing', [
            'singleListing' => $listing,
        ]);
    }

    // show create form
    public function create()
    {
        return view('create');
    }

    // store create form
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'company' => 'required|unique:listings,company',
            'title' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => 'required|email',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('flashMessage', 'Gig created Successfully');
    }

    // show edit form
    public function edit(Listing $listing)
    {
        return view('edit', ['listing' => $listing]);
    }

    // update edit form
    public function update(Request $request, Listing $listing)
    {

        // make sure the logged in user trying to update
        if($listing->user_id != auth()->id()) {
            abort('404', 'Unauthorized Account');
        }

        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => 'required|email',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/listings/manage')->with('flashMessage', 'Gig Updated Successfully');
    }

    // delete listing form
    public function destroy(Listing $listing)
    {
        // make sure the logged in user trying to delete
        if($listing->user_id != auth()->id()) {
            abort('404', 'Unauthorized Account');
        }

        $listing->delete();
        return redirect('/listings/manage')->with('flashMessage', 'Listing Gig deleted successfully');
    }

    // manage user listings
    public function manage()
    {
        return view('manageListing', [
            'listings' => auth()
                ->user()
                ->listingRelation()
                ->latest()->simplePaginate(2),
        ]);
    }

    // common resource routes
    // index - show all listings
    // show - show single listing
    // create - show form to create new listing
    // store - store new listing
    // edit - show form to edit listing
    // update - update listing
    // destroy - delete listing
}
