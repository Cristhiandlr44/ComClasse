<?php

namespace App\Console\Commands;

use App\Services\HeroCollageService;
use App\Services\HomeContentService;
use Illuminate\Console\Command;

class SyncSiteLayoutCommand extends Command
{
    protected $signature = 'site:sync-layout';

    protected $description = 'Regenera backup do CSS de colagem e home em storage/app/site-layout';

    public function handle(HeroCollageService $collage, HomeContentService $homeContent): int
    {
        $collage->writeCssFile();
        $this->line('Colagem: '.$collage->cssOutputPath());

        $homeContent->writeCssFile();
        $this->line('Home: '.$homeContent->cssOutputPath());

        $this->info('Backup salvo. O site público lê o CSS direto do JSON via Laravel.');

        return self::SUCCESS;
    }
}
