<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  //

  public function index()
  {
    $this->authorize('admin');

    return view('admin.index');
  }
}