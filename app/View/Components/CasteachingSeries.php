<?php

namespace App\View\Components;

use App\Models\Serie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CasteachingSeries extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    public static function testedBy()
    {
        return \Tests\Feature\CasteachingSeriesTest::class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // En tu controlador
        $series = Serie::with(['videos' => function ($query) {
            $query->orderBy('created_at');
        }])->get();

        return view('components.casteaching-series',[
            'series' => $series
        ]);
    }
}
