<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

	protected $news = [
		[
			'category_id' => 0,
			'title' => 'title 1'
		],
		[
			'category_id' => 1,
			'title' => '<strong>title 2</strong>'
		],
		[
			'category_id' => 0,
			'title' => 'title 3'
		],
		[
			'category_id' => 1,
			'title' => '<strong>title 4</strong>'
		],
	];
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
