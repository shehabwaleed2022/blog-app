<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
  //
  public function destroy()
  {
    auth()->logout();

    return redirect(route('home'))->with('success', 'Goodbye !');
  }

  public function create()
  {
    return view('sessions.create', ['pageTitle' => 'Login']);
  }

  public function store()
  {
    // Vlidate the request
    $attributes = request()->validate([
      'email' => ['required'],
      'password' => ['required']
    ]);

    // Auth success
    if (auth()->attempt($attributes)) {
      session()->regenerate();
      return redirect('/')->with('success', 'welcome back !');
    }

    // Auth failed
    throw ValidationException::withMessages([
      'email' => ['Your provided credentials could not be verified.'],
    ]);
  }
}