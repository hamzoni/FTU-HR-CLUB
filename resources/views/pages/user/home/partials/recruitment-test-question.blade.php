<div class="question question-{{ $order+1 }}" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            {!! nl2br($question->content) !!}
            <br/><br/>
        </div>
    </div>
    <div class="row">
        @if ($question->image)
        <div class="col-md-6">
            <img src="{{ $question->image }}"/>
        </div>
        @endif
        <div class="col-md-6" @if ($question->image) style="padding-top:15px;" @endif>
            @foreach($question->answers as $order => $answer)
                <p>
                    @if ($question->multiple_choice)
                        <input type="checkbox" name="answer_for_{{ $question->id }}[]"
                               value="{{ $answer->id }}">
                    @else
                        <input type="radio" name="answer_for_{{ $question->id }}"
                               value="{{ $answer->id }}">
                    @endif

                    {{ $answer->content }}
                </p>
            @endforeach
        </div>
    </div>
</div>