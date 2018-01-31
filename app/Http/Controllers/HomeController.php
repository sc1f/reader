<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function getDashboard(Request $request) {
        if (!Auth::check()) {
            abort(403, "Unauthorized.");

        }

        $data = [
            'email' => $request->user()->email
        ];

        return view('dashboard', $data);
    }
}
