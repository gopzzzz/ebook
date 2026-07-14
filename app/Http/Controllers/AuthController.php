<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Str;
use DB;
use Hash;


class AuthController extends Controller
{
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();
    session()->forget('guest_cart');

    return redirect('/index');
}
public function forget_password(){
    return view('web.forget');
}
public function reset(Request $request){
  // 1. Validate only format
   $request->validate([
    'email' => 'required|email',
]);

$user = User::where('email', $request->email)->first();

if (!$user) {
    return redirect('userlogin')
        ->withErrors(['email' => 'User not registered']);
}

// generate token
$token = Str::random(64);

// ✅ delete old token (avoid duplicates completely)
DB::table('password_reset_tokens')->where('email', $request->email)->delete();

// ✅ insert fresh token (hashed)
DB::table('password_reset_tokens')->insert([
    'email' => $request->email,
    'token' => Hash::make($token),
    'created_at' => now()
]);

// reset link
$resetLink = url('/reset-password/'.$token.'?email='.$request->email);

// mail
$to = $request->email;
$subject = "Reset Password";

$message = "
    <h3>Password Reset</h3>
    <p>Click below link to reset your password:</p>
    <a href='$resetLink'>Reset Password</a>
";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: support@brandsonclothing.com\r\n";

if (mail($to, $subject, $message, $headers)) {
    return redirect('userlogin')->with('success', 'Reset link sent to your email');
} else {
    return redirect('userlogin')->withErrors(['email' => 'Mail sending failed']);
}
}
}