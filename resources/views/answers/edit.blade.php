@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 style="margin: 0; padding: 0">Edit Answer</h3>
                            </div>

                            <div>
                                <a class="btn btn-outline-secondary" href="{{ route('questions.show', $question->slug) }}">Back</a>
                            </div>
                        </div>
                        
                    </div>

                    <hr>
                    <br>

                    <form action="{{ route('answers.update', ['question' => $question->slug, 'answer' => $answer->id]) }}" method="post">
                        @csrf

                        {{ method_field("patch") }}

                        <div class="form-group">
                            @if ($errors->has('body'))
                                <h6 class="text-danger">{{ $errors->first('body') }}</h6>
                            @endif

                            <textarea id="editor" name="body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
                                {{ old('body', $answer->body) }}
                            </textarea>
                        </div>



                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection