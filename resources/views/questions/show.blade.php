@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $question->title }}</h2>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>

                <div class="card-body">
                    
                    {!! $question->body_html !!}

                    <div class="float-right">
                        <span class="text-muted">Asked {{$question->created_date}}</span>

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

    <div class="row">
        <div class="col-md-12">

            <br>
            <br>

            <h2 class="text-right">{{ $question->answers_count  . " " . str_plural('Answer', $question->answers_count) }}</h2>

            <br>

            @foreach($question->answers as $answer)
                @if ($question->best_answer_id == $answer->id)
                    <div class="card text-white bg-success">
                @else
                    <div class="card">
                @endif

                        <div class="card-body">
                            {!! $answer->body_html !!}

                            <div class="float-right">
                                <span class="text-muted">Answered {{$answer->created_date}}</span>
                                
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="">
                                    </a>
                                    
                                    <div class="media-body mt-1">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
