<?php

namespace App\Http\Controllers;

use App\Service\NewsService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParseController extends Controller
{
    public function index()
    {
        $xml = XmlParser::load("https://news.yandex.ru/army.rss");
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
        ]);
        dd($data);
    }
    public function update_news(NewsService $service)
    {
        $service->UpdateNews();
        return redirect()->route('news.index');
    }
}
