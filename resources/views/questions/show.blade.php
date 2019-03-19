@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title title_and_btn_grid">
                    <h3 class="title">{{ $question->title }}</h3>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary button">Back</a>
                </div>

                <hr>

                <div class="card-body">
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a class="vote-up" title="This question is useful">
                                <i class="fas fa-caret-up fa-3x on"></i>
                            </a>

                            <span class="votes-count">1230</span>

                            <a class="vote-down" title="This question is not useful">
                                <i class="fas fa-caret-down fa-3x off"></i>
                            </a>

                            <a id="fav_btn_a" class="favourite" title="Mark as favourite">
                                <i id="fav_btn" class="fas fa-star fa-2x on"></i>
                            </a>

                            <span class="favourites-count">555</span>
                        </div>

                        <div class="media-body">
                            {!! $question->body_html !!}

                            <div class="float-right">
                                <span class="text-white">Asked {{$question->created_date}}</span>

                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}" alt="">
                                    </a>

                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <h2 class="text-right">{{ $question->answers_count  . " " . str_plural('Answer', $question->answers_count) }}</h2>

    <br>

    @include('answers._index', [
        'answers' => $question->answers,
        'best_answer_id' => $question->best_answer_id
    ])

    @include('answers._create', ['questionID' => $question->id,])
</div>
@endsection
