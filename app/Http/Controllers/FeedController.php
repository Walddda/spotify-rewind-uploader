<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Beat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class FeedController extends Controller
{
    public function show()
    {
        // $beats = File::all()->toArray();
        // $files = Beat::with('fromUser')->get()->toArray();
        $files = File::with('isBeat', 'isBeat.fromUser', 'isBeat.getCover')->get()->toArray();
        $paths = [];
        // dd($files);


        foreach ($files as $key => $value) {
            $contents = Storage::disk('public')->path('uploads\\' . $value['name']);
            $paths[$key] = $contents;
        }

        return Inertia::render('Feed', [
            'files' => $files,
            'paths' => $paths,
        ]);
    }
}
