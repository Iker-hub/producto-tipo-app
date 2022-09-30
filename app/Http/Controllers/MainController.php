<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        $data = ['activeHome' => 'active'];
        return view('main.index', $data);
    }

    function login(Request $request) {
        $request->session()->put('user', true);
        return redirect('/')->with('message', 'You are logged in.');
    }

    function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flash('message', 'You are logged out.');
        return redirect('/');
    }
}
