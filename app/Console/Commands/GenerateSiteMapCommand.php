<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;

class GenerateSiteMapCommand extends Command
{
    protected $signature = 'command:generate-site-map';

    protected $description = 'Command description';

    public function handle()
    {
        $writer = new \XMLWriter();

        $path = public_path('/sitemap.xml');

        $writer->openURI($path);
        $writer->startDocument('1.0', 'UTF-8');

        $writer->startElement('urlset');
        $writer->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        $cities = City::all();

        $host = config('app.url');

        foreach($cities as $city){
            $writer->startElement('url');

            $slug = strtolower($city->slug);

            $date = $city->updated_at->format('Y-m-d');

            $writer->writeElement('loc', "{$host}/{$slug}");
            $writer->writeElement('lastmod', $date);
            $writer->writeElement('changefreq', 'never');
            $writer->writeElement('priority', '1.0');

            $writer->endElement();
        }

        $writer->endElement();

        $writer->endDocument();

        return 0;
    }
}
