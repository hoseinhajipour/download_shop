<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentImporter extends Controller
{
    public function index()
    {
        return view('/vendor/voyager/importer/index');
    }
}
