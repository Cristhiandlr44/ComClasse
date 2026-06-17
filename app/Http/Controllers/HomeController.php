<?php

namespace App\Http\Controllers;

use App\Services\HeroCollageService;
use App\Services\HomeContentService;
use App\Support\HomeElementHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(HeroCollageService $collage, HomeContentService $homeContent)
    {
        return view('home', [
            'collageItems' => $collage->load()['items'],
            'collageImageBase' => asset($collage->imageUrlBase()),
            'he' => new HomeElementHelper($homeContent->elementsById()),
        ]);
    }

    public function servicos()
    {
        return view('servicos');
    }
}

