<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::select(['id', 'title'])->get();;
		return view('admin.news.create', ['categories' => $categories]);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(StoreRequest $request)
    {
    	$data = $request->validated();
    	$data['slug'] = \Str::slug($data['title']);

    	//add in db
		$news = News::create($data);
		if ($news) {
			return redirect()->route('news.index')
				   ->with('success', __('messages.admin.news.create.success'));
		}

		return back()->withInput()->with('fail', __('messages.admin.news.create.fail'));
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
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateRequest $request, News $news)
    {
		$data = $request->validated();
		$data['slug'] = \Str::slug($data['title']);

		$status = $news->fill($data)->save();

		if($status) {
			return redirect()->route('news.index')
				->with('success', __('messages.admin.news.edit.success'));
		}

		return back()->withInput();

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
