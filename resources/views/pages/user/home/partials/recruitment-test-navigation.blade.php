<div class="test-navigation" style="display: none;">
    <div class="row">
        <div class="col-md-12">
            <a href="javascript:void(0);" onclick="prevQuestion();" class="btn btn-circle"><span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a href="javascript:void(0);" onclick="nextQuestion();" class="btn btn-circle"><span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            &nbsp;&nbsp;&nbsp;<span class="counter"> Question <span
                        class="current-question text-primary">1</span>/8</span>
        </div>
        <br/>
    </div>
    <div class="row">
        <br/>
        <div class="col-md-12">
            @for ($i = 1; $i <= 8; $i++)
                <a href="javascript:void(0)" class="btn btn-thickness btn-question-{{ $i }}"
                   onclick="goToQuestion({{ $i }})">Question {{ $i }}</a>
            @endfor
        </div>
    </div>
</div>