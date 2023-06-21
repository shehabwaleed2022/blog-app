<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
      'name' => ['required' , 'max:255'], 
      'username' => ['required' , 'max:25'],
      'email' => ['required' , 'email' , 'max:255'], 
      'password' => ['required' , 'min:7' , 'max:255']
    ]);

    // $attributes['password'] = bcrypt($attributes['password']); 
    User::create($attributes);

    return redirect('/');
  }
}