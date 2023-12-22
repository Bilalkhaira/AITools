<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;

class ScrapeData extends Command
{
    protected $signature = 'scrape:data {url}';
    protected $description = 'Scrape data from a given URL';

    public function handle()
    {
        $url = $this->argument('url');

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $title = $crawler->filter('title')->text();

        $description = $crawler->filter('meta[name="description"]')->attr('content');

        $this->info("Title from $url: $title");
        $this->info("Description from $url: $description");
    }
}
