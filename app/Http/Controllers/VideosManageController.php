<?php

namespace App\Http\Controllers;

use App\Events\VideoCreatedEvent;
use App\Models\Serie;
use App\Models\Video;
use App\Notifications\VideoCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Tests\Feature\Videos\VideosManageControllerTest;

class VideosManageController extends Controller
{
    public static function testedBy()
    {
        return VideosManageControllerTest::class;
    }
    public function index()
    {
        return view('videos.manage.index',[
            'series' => Serie::all(),
            'videos' => Video::all()
        ]);

    }
    public function store(Request $request)
    {
        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'serie_id' => $request->serie_id,
            'published_at' => now(),
        ]);

        // Obtenim l'usuari autenticat
        $user = Auth::user();

        // Notifiquem a l'usuari autenticat
        $user->notify(new VideoCreated($video));

        session()->flash('status', 'Video created successfully');

        return redirect()->route('videos.manage.index');
    }

    public function destroy($id)
    {
        Video::find($id)->delete();

        session()->flash('status', 'Video deleted successfully');

        return redirect()->route('videos.manage.index');
    }

    public function edit($id)
    {
        return view('videos.manage.edit', [
            'video' => Video::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;

        $video->save();

        session()->flash('status', 'Video updated successfully');

        return redirect()->route('videos.manage.index');
    }

}
