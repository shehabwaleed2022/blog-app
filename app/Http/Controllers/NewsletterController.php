<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
  //

  // For single action controller
  public function __invoke(Newsletter $newsletter)
  {
    request()->validate([
      'email' => ['required', 'email']
    ]);

    try {
      $newsletter->subscribe(request('email'));
    } catch (\Exception $error) {
      throw \Illuminate\Validation\ValidationException::withMessages([
        'email' => 'Please enter a valid email. ',
      ]);
    };
    return redirect('/')->with('success', 'You are now signed up for our newsletter !');
  }
}