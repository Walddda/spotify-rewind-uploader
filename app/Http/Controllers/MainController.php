<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class FileUpload extends Controller
{
    public function homepage()
    {
        return Inertia::render('Home');
    }
}
