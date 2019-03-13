<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use \DB;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Eager loading --- It will do less query in view side
        // "user" equals to relationship method name in Question model
        $questions = Question::with("user")->latest()->paginate(4);

        return view('questions.index')->with("questions", $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        // Validation code is in app/Http/Requests/AskQuestionRequest.php
        //$request->user()->question() -> getting instance of the Question model using user relationship defined in user model
        // $request->only('title', 'body') -> return an array

        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', "Your question is submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views'); // add one to view column in question table then save it

        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        if (\Gate::denies('update-question', $question)) {
            abort(403, "Access Denied");
        }
        
        return view("questions.edit")->with('question', $question);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        if (\Gate::denies('update-question', $question)) {
            abort(403, "Access Denied");
        }
        
        $question->update($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', "Your question is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        if (\Gate::denies('delete-question', $question)) {
            abort(403, "Access Denied");
        }

        $question->delete();

        return redirect()->route('questions.index')->with('success', "Your question is deleted");
    }
}
