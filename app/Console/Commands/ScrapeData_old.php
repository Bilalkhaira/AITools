<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;

class ScrapeDataOld extends Command
{
    protected $signature = 'scrape:data';
    protected $description = 'Scrape data from a given URL';

    public function handle()
    {
        $url = 'https://aitoptools.com/top-100/';

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $crawler->filter('.loop-block')->each(function ($loopBlock) use ($client) {
            $firstAnchor = $loopBlock->filter('a')->first();

            $href = $firstAnchor->attr('href');
            $this->info("Link: $href");

            $linkedPageCrawler = $client->click($firstAnchor->link());
            // $title = $linkedPageCrawler->filter('title')->text();
            $h1 = $linkedPageCrawler->filter('h1')->text();
            $description = $linkedPageCrawler->filter('.elementor-widget-theme-post-content')->text();
            // $description = $linkedPageCrawler->filter('meta[name="description"]')->attr('content');
            $image = $linkedPageCrawler->filter('meta[property="og:image"]')->attr('content');

            // $this->info("Title: $title");
            $this->info("Title: $h1");
            $this->info("Description: $description");
            $this->info("Image: $image");
            $this->line('------------------------');
        });

    }
}
