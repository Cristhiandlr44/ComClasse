<?php

namespace App\Console\Commands;

use App\Services\HeroCollageService;
use App\Services\HomeContentService;
use App\Support\PublicAssetPublisher;
use Illuminate\Console\Command;

class SyncSiteLayoutCommand extends Command
{
    protected $signature = 'site:sync-layout';

    protected $description = 'Regenera o CSS de colagem e home a partir dos JSONs do editor';

    public function handle(HeroCollageService $collage, HomeContentService $homeContent): int
    {
        $webRoot = PublicAssetPublisher::resolveWebRoot();

        $this->info('Document root detectado: '.$webRoot);

        $collage->writeCssFile();
        foreach (PublicAssetPublisher::targetPaths('css/hero-collage.generated.css') as $path) {
            $this->line('Colagem publicada em: '.$path);
        }

        $homeContent->writeCssFile();
        foreach (PublicAssetPublisher::targetPaths('css/home-content.generated.css') as $path) {
            $this->line('Home publicada em: '.$path);
        }

        $this->info('Layout sincronizado com config/hero-collage.json e config/home-content.json.');

        return self::SUCCESS;
    }
}
