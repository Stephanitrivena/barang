<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required' , 'email:dns'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('welcome');
        }
        return back()->with('loginError', 'Login Failed');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Request()->session()->invalidate();
        return redirect('/login');
    }
}
