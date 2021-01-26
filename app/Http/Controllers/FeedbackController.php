<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackCategory;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $feedbackList = Feedback::with('feedback_category')->paginate(10);
        return view('feedback.index',['status' => $status, 'feedbackList' => $feedbackList]);
    }
    public function create()
    {
        $categories = FeedbackCategory::select(['id', 'name'])->get();;
        return view('feedback.create',['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $feedback = Feedback::create($data);
        if($feedback) {
            return redirect()->route('feedback.index')->with('success', 'Обращение создано');
        }
        return back()->withInput();
    }
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
        $feedback = Feedback::findOrFail($id);
        $categories = FeedbackCategory::select(['id', 'name'])->get();;

        return view('feedback.edit', [
            'categories' => $categories,
            'feedback' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $data = $request->except('_token');
        $status = $feedback->fill($data)->save();

        if($status) {
            return redirect()->route('feedback.index')->with('success', 'Обращение обновлено');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Feedback::destroy($id);

        if($status) {
            return redirect()->route('feedback.index')->with('success', 'Обращение удалено');
        } else{
            return redirect()->route('feedback.index')->with('fail', 'Ошибка обновления');
        }

    }
}
