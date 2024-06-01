<?php

namespace App\Http\Controllers;

use App\Events\SerieCreated;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

//use Tests\Feature\Series\SeriesManageControllerTest;

class SeriesManageController extends Controller
{
    use WithFileUploads;

    public $image;

    public function index()
    {
        return view('series.manage.index',[
            'series' => Serie::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        // Asignar la imagen subida a $this->image
        $this->image = $request->file('image');

        // Obtener el nombre original del archivo
        $originalName = $this->image->getClientOriginalName();

        // Guarda la imagen en storage/app/Img con su nombre original
        $imageName = $this->image->storeAs('Img', $originalName, 'public');

        // Verificar si el archivo existe antes de moverlo
        $imagePath = storage_path("app/public/$imageName");
        if (!File::exists($imagePath)) {
            // El archivo no existe, manejar el error aquí
            return;
        }

        // Usar el nombre original del archivo al moverlo
        $publicImagePath = public_path("storage/series/$originalName");
        File::move($imagePath, $publicImagePath);

        $imageUrl = asset("series/$originalName");
        $imageUrl = str_replace(url('/'), '', $imageUrl);



        $serie = Serie::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageUrl,
            'teacher_name' => $request->teacher_name ?? 'Teacher Name'

        ]);

        session()->flash('status', 'Successfully created');

        // DISPARAR UN EVENT
        SerieCreated::dispatch($serie);

        return redirect()->route('manage.series');

    }

    public function edit($id)
    {
        return view('series.manage.edit',['serie' => Serie::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);

        // Asignar la imagen subida a $this->image
        $this->image = $request->file('image');

        // Obtener el nombre original del archivo
        $originalName = $this->image->getClientOriginalName();

        // Guarda la imagen en storage/app/Img con su nombre original
        $imageName = $this->image->storeAs('Img', $originalName, 'public');

        // Verificar si el archivo existe antes de moverlo
        $imagePath = storage_path("app/public/$imageName");
        if (!File::exists($imagePath)) {
            // El archivo no existe, manejar el error aquí
            return;
        }

        // Usar el nombre original del archivo al moverlo
        $publicImagePath = public_path("storage/series/$originalName");
        File::move($imagePath, $publicImagePath);

        $imageUrl = asset("series/$originalName");
        $imageUrl = str_replace(url('/'), '', $imageUrl);


        $serie->title = $request->title;
        $serie->description = $request->description;
        $serie->image = $imageUrl;
        $serie->save();

        session()->flash('status', 'Successfully updated');
        return redirect()->route('manage.series');
    }

    public function destroy($id)
    {
        Serie::find($id)->delete();
        session()->flash('status', 'Successfully removed');
        return redirect()->route('manage.series');
    }
}
