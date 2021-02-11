<?php

namespace App\Service;
use App\Jobs\JobNewsParsing;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsService
{
    public function updateDbNews() :void
    {
        $resources = Resource::all();
        foreach ($resources as $resource){
            JobNewsParsing::dispatch(new NewsUpdateService($resource['url']));
        }
    }
}
