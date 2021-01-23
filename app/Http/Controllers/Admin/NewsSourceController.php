<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsSourceController extends Controller
{
    public function index()
    {
        $sources = (new NewsSource())->getAllSources();
        return view('admin.newsSource', [
            'newsSourceList' => $sources
        ]);
    }
}
