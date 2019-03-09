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

                    @csrf

                    <div class="form-group">
                        <label for="question-title">Question Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="question-title" value="{{ old('title') }}">

                        @if ($errors->has('title')) 
                            <small class="invalid-feedback text-danger">{{ $errors->first('title') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="question-body">Explain your question</label>
                        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="question-body" rows="10">{{ old('body') }}</textarea>

                        @if ($errors->has('body')) 
                            <small class="invalid-feedback text-danger">{{ $errors->first('body') }}</small>
                        @endif
                    </div>

                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Ask this Question</button>
                    </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
