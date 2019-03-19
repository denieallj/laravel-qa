<div class="row">
    <div class="col-md-12">

        <div class="card">

            <div class="card-body">
                <div class="card-title">
                    <h3>Your Answer</h3>
                </div>

                <hr>
                <br>

                <form action="{{ route('answers.store', ['question' => $questionID]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        @if ($errors->has('body'))
                            <h6 class="text-danger">{{ $errors->first('body') }}</h6>
                        @endif

                        <textarea id="editor" name="body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">
                            {{ old('body') }}
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