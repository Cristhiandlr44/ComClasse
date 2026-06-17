<?php

namespace App\Console\Commands;

use App\Services\HeroCollageService;
use App\Services\HomeContentService;
use Illuminate\Console\Command;

class SyncSiteLayoutCommand extends Command
{
    protected $signature = 'site:sync-layout';

    protected $description = 'Regenera o CSS de colagem e home a partir dos JSONs do editor';

    public function handle(HeroCollageService $collage, HomeContentService $homeContent): int
    {
        $collage->writeCssFile();
        $this->info('Colagem: '.$collage->cssOutputPath());

        $homeContent->writeCssFile();
        $this->info('Home: '.$homeContent->cssOutputPath());

        $this->info('Layout sincronizado com config/hero-collage.json e config/home-content.json.');

        return self::SUCCESS;
    }
}
