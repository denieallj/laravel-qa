@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Question</h2>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All Question</a>
                </div>

                <div class="card-body">
                    
                <form action="{{ route('questions.update', $question->id) }}" method="post">

                    {{ method_field('PUT') }}
                    @include('layouts._questionForm', ['btnText' => 'Update Question', 'title' => $question->title, 'body' => $question->body])
                    
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
