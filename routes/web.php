<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

Route::get('/hello',function(){
 return response("<h1>Hello World</h1>",200)
 ->header('content-type','text/plain') //converting html tag into a plain text
 ->header('foo','bar');
});

//here is called wildcard
Route::get('posts/{id}',function($id){
 return response("post:". $id);
})->where('id','[0-9]+');  //validating that the must be a number

Route::get('/search',function(Request $request){
dd($request);
});

// all listing
Route::get('/',[ListingController::class,'index']);

//Single Listing
// Route::get('/listings/{id}',function($id){
//     return view('listing',[
//         'listing'=>Listing::find($id)
//     ]);
// });

//anoter way to display this. this is a more cleaer way to display

// This is called route model binding.This is a technique that allows you to automatically inject model instances into your routes.
//This feature can save you time and make your code more concise.

// To use route model binding in Laravel, you can define a route parameter and then specify the model class that corresponds to that parameter
// in your route definition. For example, if you have a User model, you could define a route like this:

// Route::get('/users/{user}', function (User $user) {
//     return view('users.show', ['user' => $user]);
// });

// In this example, the {user} parameter is defined as a route parameter, and
//the User model is specified as the corresponding model class. When a user visits this route,
//Laravel will automatically retrieve the User instance that matches the ID specified in the URL
//and pass it to the route's closure as the $user parameter.

// If a matching model instance cannot be found, Laravel will automatically return a 404 response. You can also customize this behavior by defining a custom 404 handler in your application.

//create post.this most be avobe show
Route::get('/listings/create',[ListingController::class,'create']);

//store the form data
Route::post('/listings',[ListingController::class,'store']);

//Show editing Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit']);

//Update Listing
Route::put('/listings/{listing}',[ListingController::class,'update']);

// single listing route
Route::get('/listings/{listing}',[ListingController::class,'show']);

