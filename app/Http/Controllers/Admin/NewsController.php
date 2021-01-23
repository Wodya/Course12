<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
		$status = 1;
		$news = News::with('category')->paginate(10);


		return view('admin.news.index', [
			'newsList' => $news,
			'status'   => $status
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::select(['id', 'title'])->get();;
		return view('admin.news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
    		'title' => 'required|string|min:3'
		]);

        $data = $request->except('_token');
        $data['slug'] = \Str::slug($data['title']);

        //add in db
		$news = News::create($data);
		if($news) {
			return redirect()->route('news.index')
				 ->with('success', 'Новость была длбавлена');
		}


        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
    	$news = News::findOrFail($id);
    	$categories = Category::select(['id', 'title'])->get();

		return view('admin.news.edit', [
			'categories' => $categories,
			'news' => $news
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, News $news)
    {
		$request->validate([
			'title' => 'required|string|min:3'
		]);

		$data = $request->only('cateegory_id', 'title', 'description');
		$data['slug'] = \Str::slug($data['title']);

		$status = $news->fill($data)->save();

		if($status) {
			return redirect()->route('news.index')
				->with('success', 'Новость была обновлена');
		}

		return back();

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['status' => 'ok']);
    }
}
