<?php

namespace App\Http\Controllers;

use App\Jobs\JobNewsParsing;
use App\Service\ParsingService;
use Illuminate\Http\Request;



class ParserController extends Controller
{
	protected $urls = [
		'https://news.yandex.ru/music.rss',
		'https://news.yandex.ru/auto.rss',
		'https://news.yandex.ru/army.rss',
		'https://news.yandex.ru/games.rss',
		'https://news.yandex.ru/movies.rss',
		'https://news.yandex.ru/cosmos.rss',
		'https://news.yandex.ru/health.rss',
		'https://news.yandex.ru/cyber_sport.rss',
		'https://news.yandex.ru/auto_racing.rss'
	];

	/**
	 *
	 */
	public function index()
	{
//        $ParsingService = new ParsingService($this->urls[0]);
//        $ParsingService->saveData();
//	    return "dd";
        foreach($this->urls as $url) {
        	JobNewsParsing::dispatch(new ParsingService($url));
		}

        return "Спасибо, мы уже начали выполнять ваше задание!";
	}
}
