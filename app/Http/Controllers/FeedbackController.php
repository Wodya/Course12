<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        return view('feedback.index',['status' => $status]);
    }
    public function create()
    {
        return view('feedback.create',);
    }
    public function store(Request $request)
    {

        $data = $request->except('_token');
        $saveFile = function (array $data) {
            $responseData = [];
            $fileNews = storage_path('app/feedback.txt');
            if (file_exists($fileNews)) {
                $file = file_get_contents($fileNews);
                $response = json_decode($file, true);
            }


            $responseData[] = $data;
            if (isset($response) && !empty($response)) {
                $r = array_merge($response, $responseData);
            } else {
                $r = $responseData;
            }
            file_put_contents($fileNews, json_encode($r));
        };

        $saveFile($data);
        return redirect()->route('feedback.index',['status' => 1]);
    }
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('admin.news.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
