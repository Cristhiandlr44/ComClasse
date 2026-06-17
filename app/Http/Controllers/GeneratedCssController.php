<?php

namespace App\Http\Controllers;

use App\Services\HeroCollageService;
use App\Services\HomeContentService;
use Illuminate\Http\Response;

class GeneratedCssController extends Controller
{
    public function heroCollage(HeroCollageService $collage): Response
    {
        return response(
            $collage->generateCss($collage->load()),
            200,
            [
                'Content-Type' => 'text/css; charset=UTF-8',
                'Cache-Control' => 'public, max-age=300',
                'X-Site-Layout' => 'hero-collage-dynamic',
            ]
        );
    }

    public function homeContent(HomeContentService $homeContent): Response
    {
        return response(
            $homeContent->generateCss($homeContent->load()),
            200,
            [
                'Content-Type' => 'text/css; charset=UTF-8',
                'Cache-Control' => 'public, max-age=300',
                'X-Site-Layout' => 'home-content-dynamic',
            ]
        );
    }
}
