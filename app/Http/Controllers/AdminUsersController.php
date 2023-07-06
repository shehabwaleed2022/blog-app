<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class AdminUsersController extends Controller
{
  //
  public function index()
  {
    return view('admin.users.index', [
      'users' => User::all()->except(auth()->user()->id),
    ]);
  }


  public function destroy(User $user)
  {
    $user->delete();

    return Redirect::back();
  }


  public function edit(User $user)
  {
    return view('admin.users.edit', [
      'user' => $user,
    ]);
  }


  public function update(User $user)
  {
    // Validation the data
    $attributes = request()->validate([
      'first_name' => ['min:3', 'max:25'],
      'last_name' => ['min:3', 'max:25'],
      'username' => ['min:3', 'max:25', Rule::unique('users', 'username')->ignore($user->id)],
      'email' => ['email:filter', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
      'photo' => ['image'],
      'password' => ['min:7', 'max:255'],
      'repeated-password' => ['min:7', 'max:255']
    ]);

    if ($attributes['photo'] ?? false) {
      $attributes['photo'] = request()->file('photo')->store();
    }

    // update the user data
    $user->update($attributes);

    // redirect
    return redirect(route('users.index'));
  }
}