<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function PHPUnit\Framework\exactly;

class NewsController extends Controller
{
    private $categories = [
        ['id' => 1, 'name' => 'Категория 1'],
        ['id' => 2, 'name' => 'Категория 2'],
        ['id' => 3, 'name' => 'Категория 3'],
        ['id' => 4, 'name' => 'Категория 4'],
        ['id' => 5, 'name' => 'Категория 5']
    ];
    private $news = [
        ['id' => 1, 'categoryId' => 1 , 'text' => 'Категория 1. Новость 1.', 'info' => 'Категория 1. Новость 1. Подробное описание новости'],
        ['id' => 2, 'categoryId' => 1 , 'text' => 'Категория 1. Новость 2.', 'info' => 'Категория 1. Новость 2. Подробное описание новости'],
        ['id' => 3, 'categoryId' => 1 , 'text' => 'Категория 1. Новость 3.', 'info' => 'Категория 1. Новость 3. Подробное описание новости'],
        ['id' => 4, 'categoryId' => 1 , 'text' => 'Категория 1. Новость 4.', 'info' => 'Категория 1. Новость 4. Подробное описание новости'],
        ['id' => 5, 'categoryId' => 1 , 'text' => 'Категория 1. Новость 5.', 'info' => 'Категория 1. Новость 5. Подробное описание новости'],
        ['id' => 6, 'categoryId' => 1 , 'text' => 'Категория 1. Новость 6.', 'info' => 'Категория 1. Новость 6. Подробное описание новости'],
        ['id' => 7, 'categoryId' => 2 , 'text' => 'Категория 2. Новость 1.', 'info' => 'Категория 2. Новость 1. Подробное описание новости'],
        ['id' => 8, 'categoryId' => 2 , 'text' => 'Категория 2. Новость 2.', 'info' => 'Категория 2. Новость 2. Подробное описание новости'],
        ['id' => 9, 'categoryId' => 2 , 'text' => 'Категория 2. Новость 3.', 'info' => 'Категория 2. Новость 3. Подробное описание новости'],
        ['id' => 10, 'categoryId' => 2, 'text' => 'Категория 2. Новость 4.', 'info' => 'Категория 2. Новость 4. Подробное описание новости'],
        ['id' => 11, 'categoryId' => 2, 'text' => 'Категория 2. Новость 5.', 'info' => 'Категория 2. Новость 5. Подробное описание новости'],
        ['id' => 12, 'categoryId' => 2, 'text' => 'Категория 2. Новость 6.', 'info' => 'Категория 2. Новость 6. Подробное описание новости'],
        ['id' => 13, 'categoryId' => 3, 'text' => 'Категория 3. Новость 1.', 'info' => 'Категория 3. Новость 1. Подробное описание новости'],
        ['id' => 14, 'categoryId' => 3, 'text' => 'Категория 3. Новость 2.', 'info' => 'Категория 3. Новость 2. Подробное описание новости'],
        ['id' => 15, 'categoryId' => 3, 'text' => 'Категория 3. Новость 3.', 'info' => 'Категория 3. Новость 3. Подробное описание новости'],
        ['id' => 16, 'categoryId' => 3, 'text' => 'Категория 3. Новость 4.', 'info' => 'Категория 3. Новость 4. Подробное описание новости'],
        ['id' => 17, 'categoryId' => 3, 'text' => 'Категория 3. Новость 5.', 'info' => 'Категория 3. Новость 5. Подробное описание новости'],
        ['id' => 18, 'categoryId' => 3, 'text' => 'Категория 3. Новость 6.', 'info' => 'Категория 3. Новость 6. Подробное описание новости'],
        ['id' => 19, 'categoryId' => 4, 'text' => 'Категория 4. Новость 1.', 'info' => 'Категория 4. Новость 1. Подробное описание новости'],
        ['id' => 20, 'categoryId' => 4, 'text' => 'Категория 4. Новость 2.', 'info' => 'Категория 4. Новость 2. Подробное описание новости'],
        ['id' => 21, 'categoryId' => 4, 'text' => 'Категория 4. Новость 3.', 'info' => 'Категория 4. Новость 3. Подробное описание новости'],
        ['id' => 22, 'categoryId' => 4, 'text' => 'Категория 4. Новость 4.', 'info' => 'Категория 4. Новость 4. Подробное описание новости'],
        ['id' => 23, 'categoryId' => 4, 'text' => 'Категория 4. Новость 5.', 'info' => 'Категория 4. Новость 5. Подробное описание новости'],
        ['id' => 24, 'categoryId' => 4, 'text' => 'Категория 4. Новость 6.', 'info' => 'Категория 4. Новость 6. Подробное описание новости'],
    ];
    function index(){
        echo '<h1>Список категорий новостей</h1>';
        foreach ($this->categories as $category){
            $text = $category['name'];
            $href = route('category.news',[$category['id']]);
            echo "<a href=\"{$href}\">{$text}</a> <BR />";
        }

    }
    function news(int $id){
        $category = Arr::first($this->categories, function ($value, $key) use ($id) {return $value['id'] == $id;});
        if($category === null){
            echo "<h1>Категория не найдена</h1>";
            exit();
        }
        $news = Arr::where($this->news, function ($value, $key) use ($id) {return $value['categoryId'] == $id;});
        echo "<h1>Список новостей в {$category['name']}</h1>";
        foreach ($news as $new) {
            $text = $new['text'];
            $href = route('category.news.info', [$new['id']]);
            echo "<a href=\"{$href}\">{$text}</a> <BR />";
        }
    }
    function newsInfo(int $id){
        $new = Arr::first($this->news, function ($value, $key) use ($id) {return $value['id'] == $id;});
        if($new === null){
            echo "<h1>Новость не найдена</h1>";
            exit();
        }
        echo $new['info'];
    }
}
