<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function activity_logs($attemp){
        $date= Carbon::now()->format('d-m-Y H:i:s');
        $date = Carbon::now('GMT+8');

        DB::table('activity_log')->insert([
            "log_name" => Auth::user()->name,
            "description" => "This User has been " .$attemp. " on " .$date,
            "Event" => $attemp,
            "causer_id" => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

    }

    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->activity_logs('Login');
            return redirect()->intended('admin/dashboard');
        }
 
        // return redirect()'error', 'The provided credentials do not match our records.'])
        return Redirect::back()->withErrors(['message', 'The provided credentials do not match our records.']);

    }
    
    public function logout(){

        $this->activity_logs('Logout');

        Session::flush();

        Auth::logout();

        return redirect('login');

    }
}
