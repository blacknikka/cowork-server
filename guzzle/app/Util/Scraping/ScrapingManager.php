<?php

namespace App\Util\Scraping;

use GuzzleHttp\Client;

class ScrapingManager
{
    public function exec()
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            'https://goworkship.com/magazine/tokyo-coworking-space/',
            ['verify' => false]
        );

        $document = new \DOMDocument();
        @$document->loadHTML(mb_convert_encoding($response->getBody()->getContents(), 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new \DOMXPath($document);

        // 各店舗情報のテーブルを取得する
        $nodes = $xpath->query('//div[@class="tableWrap"]/table/tbody');

        $tags = [];
        foreach ($nodes as $tbody) {
            $item = [];
            foreach ($xpath->query('.//tr', $tbody) as $t_row) {
                // 取得したテーブルを解析する
                $title = $xpath->evaluate('normalize-space(.//td[1])', $t_row);
                $data = $xpath->query('.//td[2]', $t_row)->item(0);
                // $data = $xpath->query('.//td[2]', $t_row)->item(0);

                // データの作成
                switch ($title) {
                    case '施設':
                        $item['name'] = $data->nodeValue;
                        break;
                    case '住所':
                        $item['address'] = $data->nodeValue;
                        break;
                    case '営業時間':
                        $item['time'] = $data->nodeValue;
                        break;
                }
            }
            $tags[] = $item;
        }

        return $tags;
    }
}
