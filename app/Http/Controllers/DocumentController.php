<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Makes sure all the functions are authenticated
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDocuments(Request $request, $user_id) {
        // return 200 with JSON or HTTP error
    }

    public function createDocument(Request $request, $user_id) {
        // return 200 or HTTP error
    }
}
