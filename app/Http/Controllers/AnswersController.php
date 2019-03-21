<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\SendAnswerRequest;
use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, SendAnswerRequest $request)
    {

        $request->user()->answers()->create([
            'body' => $request->body,
            'question_id' => $question->id
        ]);

        return back()->with('success', 'Your answer has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit')->with([
            'question' => $question,
            'answer' => $answer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Answer $answer, SendAnswerRequest $request)
    {
        $this->authorize('update', $answer);

        $answer->body = $request->body;
        $answer->save();

        return redirect()->route('questions.show', $question->slug)->with('success', 'Answer has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();
        return back()->with('success', 'Answer has been deleted.');
    }
}
