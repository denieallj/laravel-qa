@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Ask Questions</h2>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to All Question</a>
                </div>

                <div class="card-body">
                    
                <form action="{{ route('questions.store') }}" method="post">

                    @include('layouts._questionForm', ['btnText' => "Ask Question", 'title' => '', 'body' => ''])

                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
