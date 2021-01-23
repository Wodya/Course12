<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    protected $table = "categories";

    public function getAllSources()
    {
        return \DB::select("select id,name,url from news_sources");
    }
}
