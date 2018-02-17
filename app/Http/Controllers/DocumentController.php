<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Makes sure all the functions are authenticated
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDocumentList(Request $request) {
        // return 200 with JSON or HTTP error
    }

    public function getDocumentById(Request $request, $document_id) {


    }

    public function createDocument(Request $request) {
        // return 200 or HTTP error
        $s3 = Storage::disk('s3');
        if(Input::hasFile('document')) {
            $file = Input::file('document');
        }
    }
}
