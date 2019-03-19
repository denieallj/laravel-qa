<div class="row">
    <div class="col-md-12">

        @foreach($answers as $answer)
            <div class="card {{ $best_answer_id == $answer->id ? 'best_answer_background' : '' }}">

                <div class="card-body answer_vote_control control">

                    <div class="d-flex flex-column vote-controls">
                        <a class="vote-up" title="This question is useful">
                            <i class="fas fa-caret-up fa-3x on"></i>
                        </a>

                        <span class="votes-count">1230</span>

                        <a class="vote-down" title="This question is not useful {{$answer->id}}">
                            <i class="fas fa-caret-down fa-3x off"></i>
                        </a>

                        <a class="correct_btn_a vote-accepted mt-2" title="Mark as best answer">
                            <i class="fas fa-check fa-2x on_best_answer correct_i"></i>
                        </a>

                        <span class="favourites-count">555</span>
                    </div>

                    <div class="answer_body">

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
            </div>

            <br>
        @endforeach
    </div>
</div>