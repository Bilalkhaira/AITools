<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Tool;
use App\Models\ToolsImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ScrapeData extends Command
{
    protected $signature = 'scrape:data';
    protected $description = 'Scrape data from a given URL';

    public function handle()
    {
        $url = 'https://aitoptools.com/new-tools/';

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $crawler->filter('.loop-block')->each(function ($loopBlock) use ($client) {
            $firstAnchor = $loopBlock->filter('a')->first();

            $href = $firstAnchor->attr('href');

            $linkedPageCrawler = $client->click($firstAnchor->link());
            $title = $linkedPageCrawler->filter('h1')->text();
            $description = $linkedPageCrawler->filter('.elementor-widget-theme-post-content')->text();
            $image = $linkedPageCrawler->filter('meta[property="og:image"]')->attr('content');
            $link = $linkedPageCrawler->filter('.jet-listing-dynamic-link__link')->attr('href');

            $path =  now()->timestamp . '_' . uniqid() . '.jpg';
            $directory = dirname(public_path('images/frontend/' . $path));
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }
            file_put_contents(public_path('images/frontend/' . $path), file_get_contents($image));

            $record = Tool::create([
                        'title' => $title ?? '',
                        'description' => $description ?? '',
                        'status' => 'Activate',
                        'price' => 'Free',
                        'tool_categories_id' => 5,
                        'website_link' => $link,
                    ]);

            ToolsImage::create([
                'tool_id' => $record->id ?? '',
                'images' => $path ?? ''
            ]);
            $this->info($link);
        });

        $this->info("Command run successfully");

    }
}