<?php

namespace App\Service;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsService
{
    private function UpdateNews($url)
    {
        $xml = XmlParser::load($url);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
        ]);

        foreach ($data['news'] as $item){
            if(News::where('guid',$item['guid'])->first())
                continue;
            $news = new News();
            $news->category_id=1;
            $news->source_id=1;
            $news->title = $item['title'];
            $news->slug = Str::of($item['title'])->slug();
            $news->description = $item['description'];
            $news->guid = $item['guid'];
            $news->save();
        }
    }
    public function updateDbNews() :void
    {
        $resources = Resource::all();
        foreach ($resources as $resource){
            $this->UpdateNews($resource['url']);
        }
    }
}
