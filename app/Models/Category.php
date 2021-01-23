<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function news(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(News::class, 'category_id', 'id');
	}
}
