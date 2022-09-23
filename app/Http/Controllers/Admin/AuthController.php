<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Exception;
class AuthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function loginPage()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        Auth::logout();
        $remember_me = $request->has('remember_me') ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'Admin'], $remember_me)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Success');
        }
        return redirect()->back()->with('Failed', 'Invalid username or password.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('admin.login');
    }
}
