<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResourceRequest;
use App\Http\Requests\UpdateRequest;
use App\Jobs\JobNewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use App\Service\NewsService;
use App\Service\ParsingService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::paginate(10);
        return view('admin.resource.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ResourceRequest $request)
    {
        $data = $request->validated();
        //add in db
        $resource = Resource::create($data);
        if ($resource) {
            return redirect()->route('resource.index')
                ->with('success', 'Ресурс добавлен');
        }

        return back()->withInput()->with('fail', 'Ошибка добавления');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $resource = Resource::findOrFail($id);

        return view('admin.resource.edit', [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Resource $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ResourceRequest $request, Resource $resource)
    {
        $data = $request->validated();

        $status = $resource->fill($data)->save();

        if($status) {
            return redirect()->route('resource.index')->with('success', 'Обновлено успешно');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();
        return response()->json(['status' => 'ok']);
    }
    public function update_news(NewsService $service)
    {
//        dd('update_news');
        $service->updateDbNews();
        return redirect()->route('news.index')->with('success', 'Обновление запущено');
    }
}
