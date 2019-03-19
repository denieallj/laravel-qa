@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>All Questions</h2>
                    <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    
                    @foreach ($questions as $question)

                        <div class="media question_index_flex">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes_count }}</strong> {{ str_plural('vote', $question->votes_count) }}
                                </div>

                                <div class="status {{ $question->answer_status }}">
                                    <strong>{{ $question->answers_count }}</strong> {{ str_plural('answer', $question->answers_count) }}
                                </div>

                                <div class="view">
                                    {{ $question->views_count . " " . str_plural('view', $question->views_count) }}
                                </div>
                            </div>

                            <div class="media-body">
                                <div class="question_title_and_btn_grid">
                                    <div class="title">
                                        <h3><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                    </div>

                                    <div class="button">
                                        @can ('update', $question)
                                            <a href="{{ route('questions.edit', $question->slug) }}" class="btn btn-outline-info btn-sm">Edit</a>
                                        @endcan

                                        @can ('delete', $question)
                                            <button data-toggle="modal" data-target="#confirmModal" class="btn btn-outline-danger btn-sm">Delete</button>
                                            @include('layouts._confirmModal', ["route" => route('questions.destroy', $question->id), 'message' => "Are you sure about deleting this question?"])
                                        @endcan
                                    </div>
                                </div>
                                
                                <p class="lead">
                                    Asked by <a href="{{ $question->user->url }}">{{ $question->user->name}}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>

                                {!! str_limit($question->body_html, 250) !!}
                            </div>
                        </div>

                        <hr>
                    @endforeach
                    
                    <br>

                    <nav class="text-center" style="display: flex; flex-direction: row; justify-content: center;">
                        {{ $questions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
