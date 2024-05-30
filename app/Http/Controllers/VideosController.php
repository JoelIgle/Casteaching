<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideosController extends Controller
{
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }
}
