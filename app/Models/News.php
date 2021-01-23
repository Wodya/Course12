<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = ['category_id', 'title', 'slug', 'image', 'description'];
   //protected $guarded = ['id'];

	public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

}
