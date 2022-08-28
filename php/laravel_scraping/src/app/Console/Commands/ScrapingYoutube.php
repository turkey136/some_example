<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;

class ScrapingYoutube extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scrapingYoutube';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $youtubePath = 'https://www.youtube.com/feed/trending?persist_gl=1&gl=JP';
        $client = new Goutte\Client();
        $crawler = $client->request('GET', $youtubePath);
        $crawler->each(function ($node) {
            if (preg_match("/var ytInitialData =/",  $node->text())) {
                print $node->text()."\n";
                $json = preg_replace("/.+var ytInitialData = /", "", $node->text());
                $json = preg_replace("/;if .+/", '', $json);
                $json = json_decode($json, true);

                // 急上昇1件目を取り出し
                $data = $json['contents']['twoColumnBrowseResultsRenderer']['tabs'][0]['tabRenderer']['content']['sectionListRenderer']['contents'][0]['itemSectionRenderer']['contents'][0]['shelfRenderer']['content']['expandedShelfContentsRenderer']['items'][0]['videoRenderer'];

                $todayData = [
                    'videoId' => $data['videoId'],
                    'title' => $data['title']['runs'][0]['text'],
                    'description' => $data['descriptionSnippet']['runs'][0]['text'],
                    'channel' => [
                        'name' => $data['longBylineText']['runs'][0]['text'],
                        'url' => $data['longBylineText']['runs'][0]['navigationEndpoint']['browseEndpoint']['canonicalBaseUrl']
                    ]
                ];

                $youtubeJsonFilePath = 'storage/app/public/buzz_tube.json';
                $buzzTubeData = [];
                if (file_exists($youtubeJsonFilePath)) {
                  $buzzTubeData = file_get_contents($youtubeJsonFilePath);
                  $buzzTubeData = json_decode($buzzTubeData, true);
                }
                $buzzTubeData[date("Y-m-d")] = $todayData;
                file_put_contents($youtubeJsonFilePath, json_encode($buzzTubeData));

                //eval(\Psy\sh());
            }
        });

        return 0;
    }
}
