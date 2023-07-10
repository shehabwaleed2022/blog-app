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
            'users' => User::with(['posts' => function ($query) {
                $query->select('user_id'); }])->withCount('posts')->where('id', '!=', auth()->user()->id)->paginate(10)
        ]);
    }



    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::back()->with('success', 'User deleted successfully.');
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }


    public function update(User $user)
    {

        $attributes = request()->validate([
            'first_name' => ['min:3', 'max:25'],
            'last_name' => ['min:3', 'max:25'],
            'username' => ['min:3', 'max:25', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['email:filter', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'photo' => ['image'],
            'password' => ['min:7', 'max:255'],
            'repeated-password' => ['min:7', 'max:255'],
            'status' => ['required']
        ]);

        if ($attributes['photo'] ?? false) {
            $attributes['photo'] = request()->file('photo')->store();
        }

        $attributes['is_active'] = ($attributes['status'] == 'active') ? 1 : 0;
        unset($attributes['status']);


        $user->update($attributes);

        // redirect
        return redirect(route('users.index'))->with('success', 'User updated successfully.');
    }
}
