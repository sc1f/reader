<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    /**
     * Makes sure all the functions are authenticated
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDeadlines(Request $request, $user_id) {
        // return 200 with JSON or HTTP error
    }

    public function createDeadline(Request $request, $user_id) {
        // return 200 or HTTP error
    }
}
