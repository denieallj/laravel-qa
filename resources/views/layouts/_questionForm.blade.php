@csrf

<div class="form-group">
    <label for="question-title">Question Title</label>
<input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="question-title" value="{{ old('title', $title) }}">

    @if ($errors->has('title')) 
        <small class="invalid-feedback text-danger">{{ $errors->first('title') }}</small>
    @endif
</div>

<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="question-body" rows="10">{{ old('body', $body) }}</textarea>

    @if ($errors->has('body')) 
        <small class="invalid-feedback text-danger">{{ $errors->first('body') }}</small>
    @endif
</div>

<div class="form-group d-flex flex-row-reverse">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $btnText }}</button>
</div>