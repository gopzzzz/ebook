<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use DB;


class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request)
    {
     // Normalize email (important)
    $request->merge([
        'email' => strtolower(trim($request->email))
    ]);

    // Validation
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    // Reset password
    $status = Password::broker()->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),

        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->remember_token = Str::random(60);
            $user->save();

            event(new PasswordReset($user));
        }
    );

    // Response
    if ($status === Password::PASSWORD_RESET) {
        return redirect()->route('userlogin')
            ->with('success', '✅ Password reset successful');
    }

    return back()->withErrors([
        'email' => __($status) // shows real error
    ]);
    }
}
