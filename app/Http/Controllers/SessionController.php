<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (User::where('email', $attributes['email'])->exists()) {

            $user = User::where('email', $attributes['email'])->first();
            if ($user->is_active) {
                // Auth faild
                if (!auth()->attempt($attributes))
                    return throw ValidationException::withMessages([
                        'email' => 'Your provided credentials could not be verified.'
                    ]);

                session()->regenerate();
                return redirect('/')->with('success', 'welcome back !');
            } else {
                return throw ValidationException::withMessages([
                    'email' => 'Your account is not active, please contact with us. '
                ]);
            }
        } else {
            return throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

    }
}
