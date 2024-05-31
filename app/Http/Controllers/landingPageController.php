<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tests\Feature\landingPageControllerTest;

class landingPageController extends Controller
{
    public static function testedBy()
    {
        return landingPageControllerTest::class;
    }

    public function show()
    {
        return view('welcome');
    }

}
