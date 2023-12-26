<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Illuminate\Support\Facades\File;

class SaveImages extends Command
{
    protected $signature = 'save:images';
    protected $description = 'Fetch and save images from URLs';

    public function handle()
    {
        $urls = [
            'https://aitoptools.com/wp-content/uploads/2023/03/myreport.jpg',
            'https://aitoptools.com/wp-content/uploads/2023/03/mixo-io.jpg',
        ];

        foreach ($urls as $url) {

            $path =  now()->timestamp . '_' . uniqid() . '.jpg';

            $directory = dirname(public_path('images/frontend/' . $path));
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true, true);
            }

            file_put_contents(public_path('images/frontend/' . $path), file_get_contents($url));


            $this->info("Image saved: $path");
        }
    }

}
