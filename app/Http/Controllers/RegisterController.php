<?php

namespace App\Http\Controllers;

use App\Mail\signup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
  //
  public function create()
  {
    return view('register.create', ['pageTitle' => 'Registeration']);
  }

  public function store()
  {
    // Validation the inputs :
    $attributes = request()->validate([
      'first_name' => ['required' ,'min:3', 'max:25'], 
      'last_name' => ['required' , 'min:3' ,'max:25'], 
      'username' => ['required' ,'min:3' , 'max:25' , Rule::unique('users' , 'username') ],
      'email' => ['required' , 'email:filter' , 'max:255' , Rule::unique('users', 'email') ], 
      'password' => ['required' , 'min:7' , 'max:255']
    ]);

    // $attributes['password'] = bcrypt($attributes['password']); 
    $currentUser = User::create($attributes);
        
    // log the user in 
    auth()->login($currentUser);

    return redirect('/')->with('success', 'Your account has been created successfully.');
    // With method Flashes a piece of data to the session.
    // This message will stil in the session for one page and then it disappear
  }
}