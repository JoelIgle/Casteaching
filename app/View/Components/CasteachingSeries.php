<?php

namespace App\View\Components;

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
        return view('components.casteaching-series',[
            'series' => \App\Models\Serie::all()
        ]);
    }
}
