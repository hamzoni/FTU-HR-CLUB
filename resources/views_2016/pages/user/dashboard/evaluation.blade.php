@extends('layouts.user.dashboard.frame', ['hiddenNavbar' => true])

@section('dashboardNavbar')
    @include('pages.user.dashboard.evaluation-navbar')
@stop

@push('modal')
<div class="modal hrc-dashboard-modal fade" id="evaluationIntroduce" tabindex="-1" role="dialog" aria-labelledby="evaluationIntroduceLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper">
                    <p>Với mỗi câu trắc nghiệm, Ứng viên lựa chọn thang điểm 0-4 với cách đánh giá như sau:</p>

                    <ul>
                        <li>0: Hoàn toàn không đúng với bản thân</li>
                        <li>1: Đúng trong một số trường hợp</li>
                        <li>2: Đúng trong 50% trường hợp</li>
                        <li>3: Đúng trong đa số trường hợp</li>
                        <li>4: Hoàn toàn đúng với bản thân</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hrc-dashboard-modal fade" id="evaluationSuccess" tabindex="-1" role="dialog" aria-labelledby="evaluationSuccessLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body-wrapper text-center">
                    <p>Chúc mừng bạn đã hoàn thành Personality Test!</p>

                    <a href="{{ route('dashboard.evaluation') }}" class="btn btn-evaluation-success">Xem kết quả chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

@section('rightContent')
    <div class="panel panel-dashboard panel-personality-test">
        <div class="panel-heading">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    0%
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="ajax-loading"></div>

            <div class="hrc-personality-test-questions-container hide" id="hrc-personality-section-start-start">
                <h3 style="padding-top: 0; margin-top: 0;">Chào mừng bạn đến với Personality Test của Ứng viên Tài năng 2016.</h3>

                <p>Bạn đang băn khoăn trong việc lựa chọn ngành nghề cho sự nghiệp của mình? Dựa trên chỉ số phân loại tính cách của Myers-Briggs, HRC đem đến cho bạn giải pháp khám phá bản thân, lời khuyên ngành nghề phù hợp với cá tính của bạn nhất. Chỉ 10 phút để tìm ra sự nghiệp của mình, bạn có muốn thử?</p>

                <p>Với mỗi câu trắc nghiệm, Ứng viên lựa chọn thang điểm 0-4 với cách đánh giá như sau:</p>

                <ul>
                    <li>0: Hoàn toàn không đúng với bản thân</li>
                    <li>1: Đúng trong một số trường hợp</li>
                    <li>2: Đúng trong 50% trường hợp</li>
                    <li>3: Đúng trong đa số trường hợp</li>
                    <li>4: Hoàn toàn đúng với bản thân</li>
                </ul>

                <br />

                <div class="text-center">
                    <button type="button" class="btn btn-next-question">Bắt đầu</button>
                </div>
            </div>

            @foreach (config('hrc.questions') as $group1 => $sections)
                @foreach ($sections as $group2 => $questions)
                    <div class="hrc-personality-test-questions-container hide" id="hrc-personality-section-{{ $group1 }}-{{ $group2 }}">
                        @foreach ($questions as $id => $questionContent)
                            <div class="hrc-personality-test-question">
                                <div class="hrc-personality-test-question-content">
                                    {{ $questionContent }}
                                </div>

                                <div class="hrc-personality-test-question-answer">
                                    <ul>
                                        @for ($i = 0; $i < 5; $i ++)
                                            <li>
                                                <a href="#"
                                                   data-question-id="{{ $id }}" data-score="{{ $i }}"
                                                   data-group-1="{{ $group1 }}" data-group-2="{{ $group2 }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endforeach

            <div class="clearfix">
                <div class="pull-left btn-prev-question-container hide">
                    <button type="button" class="btn btn-prev-question">Câu trước</button>
                </div>

                <div class="pull-right btn-next-question-container hide">
                    <button type="button" class="btn btn-next-question">Câu tiếp</button>
                </div>
            </div>

            <div class="hrc-personality-test-questions-container text-center hide" id="hrc-personality-section-final-final">
                Vui lòng chờ. Kết quả đang được cập nhật.
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        var PersonalityTestFunc = {
            currentGroup1: 'tf',
            currentGroup2: 't',
            currentSheet: {
                'ie': {
                    'i': {},
                    'e': {}
                },

                'sn': {
                    's': {},
                    'n': {}
                },

                'tf': {
                    't': {},
                    'f': {}
                },

                'jp': {
                    'j': {},
                    'p': {}

                }
            },
            currentProgress: 0,

            resultSymbolSheet: {
                'tf': {
                    '1': 't',
                    '-1': 'f',
                    '0': 't'
                },

                'jp': {
                    '1': 'j',
                    '-1': 'p',
                    '0': 'j'
                },

                'sn': {
                    '1': 's',
                    '-1': 'n',
                    '0': 's'
                },

                'ie': {
                    '1': 'i',
                    '-1': 'e',
                    '0': 'e'
                }
            },

            init: function () {
                this.listen();
                this.start();
            },

            start: function () {
                this.goToSection('start', 'start');
            },

            listen: function () {
                $(".hrc-personality-test-question-answer a").on('click', function (e) {
                    e.preventDefault();

                    var group1 = $(this).data('group-1');
                    var group2 = $(this).data('group-2');
                    var score = $(this).data('score');
                    var questionId = $(this).data('question-id');

                    PersonalityTestFunc.updateSheet(group1, group2, questionId, score);
                });

                $(".btn-next-question").on('click', function (e) {
                    PersonalityTestFunc.prevNext(false);
                });

                $(".btn-prev-question").on('click', function (e) {
                    PersonalityTestFunc.prevNext(true);
                });
            },

            prevNext: function (reverse) {
                if (this.currentGroup1 == 'start' && this.currentGroup2 == 'start') {
                    this.goToSection('tf', 't');

                    return;
                }

                var totalAnswers = Object.keys(this.currentSheet[this.currentGroup1][this.currentGroup2]).length;

                if (totalAnswers != 5 && !reverse) {
                    $.notify({
                        // options
                        message: 'Bạn cần trả lời tất cả các câu hỏi.'
                    },{
                        // settings
                        type: 'warning',
                        z_index: 1140
                    });
                } else {
                    switch (PersonalityTestFunc.currentGroup1) {
                        case 'tf':
                            switch (PersonalityTestFunc.currentGroup2) {
                                case 't':
                                    PersonalityTestFunc.goToSection('tf', 'f');
                                    break;

                                case 'f':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('tf', 't');
                                    } else {
                                        PersonalityTestFunc.goToSection('jp', 'j');
                                    }
                                    break;
                            }
                            break;

                        case 'jp':
                            switch (PersonalityTestFunc.currentGroup2) {
                                case 'j':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('tf', 'f');
                                    } else {
                                        PersonalityTestFunc.goToSection('jp', 'p');
                                    }
                                    break;

                                case 'p':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('jp', 'j');
                                    } else {
                                        PersonalityTestFunc.goToSection('sn', 's');
                                    }
                                    break;
                            }
                            break;

                        case 'sn':
                            switch (PersonalityTestFunc.currentGroup2) {
                                case 's':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('jp', 'p');
                                    } else {
                                        PersonalityTestFunc.goToSection('sn', 'n');
                                    }
                                    break;

                                case 'n':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('sn', 's');
                                    } else {
                                        PersonalityTestFunc.goToSection('ie', 'i');
                                    }
                                    break;
                            }
                            break;

                        case 'ie':
                            switch (PersonalityTestFunc.currentGroup2) {
                                case 'i':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('sn', 'n');
                                    } else {
                                        PersonalityTestFunc.goToSection('ie', 'e');
                                    }
                                    break;

                                case 'e':
                                    if (reverse) {
                                        PersonalityTestFunc.goToSection('ie', 'i');
                                    } else {
                                        $(".btn-prev-question-container").addClass('hide');
                                        $(".btn-next-question-container").addClass('hide');

                                        PersonalityTestFunc.goToSection('final', 'final', function () {
                                            var result = PersonalityTestFunc.calculateResult();
                                            PersonalityTestFunc.updateResultToServer(result);
                                        });
                                    }
                                    break;
                            }
                            break;
                    }
                }
            },

            updateSheet: function (group1, group2, questionId, score) {
                if (!this.currentSheet[group1][group2][questionId]) {
                    PersonalityTestFunc.updateProgress(this.currentProgress + 2.5);
                }

                this.currentSheet[group1][group2][questionId] = score;

                var question = $("#hrc-personality-section-" + group1 +"-" + group2).find('.hrc-personality-test-question').eq(questionId);

                question.find('.active').removeClass('active');
                question.find('.hrc-personality-test-question-answer li').eq(score).addClass('active');
            },

            goToSection: function (group1, group2, callback) {
                if (group1 == 'tf' && group2 == 't') {
                    $(".btn-prev-question-container").addClass('hide');
                    $(".btn-next-question-container").removeClass('hide');
                } else if (group1 == 'start' && group2 == 'start') {
                    $(".btn-prev-question-container").addClass('hide');
                    $(".btn-next-question-container").addClass('hide');
                } else {
                    $(".btn-prev-question-container").removeClass('hide');
                }

                this.currentGroup1 = group1;
                this.currentGroup2 = group2;

                $(".hrc-personality-test-questions-container").addClass('hide');

                this.startAjaxLoading();

                window.setTimeout(function () {
                    $("#hrc-personality-section-" + group1 +"-" + group2).removeClass('hide');

                    PersonalityTestFunc.stopAjaxLoading();

                    if (typeof callback != typeof undefined) {
                        callback();
                    }
                }, 500);
            },

            calculateResult: function () {
                return _.map(PersonalityTestFunc.currentSheet, function (a, key) {
                    var arrayScore = _.map(a, function (b) {
                        return _.reduce(b, function (totalScore, b) {
                            return totalScore + b;
                        });
                    });

                    var result = (arrayScore[0] > arrayScore[1]) ? 1 : ((arrayScore[0] < arrayScore[1]) ? -1 : 0 );

                    return PersonalityTestFunc.resultSymbolSheet[key][result];
                }).join('').toUpperCase();
            },

            updateProgress: function (progress) {
                $(".progress .progress-bar").css({
                    width: progress + '%'
                }).html(progress + '%');

                this.currentProgress = progress;
            },

            updateResultToServer: function (result) {
                var request = $.ajax({
                    url: laroute.route('api.personalityTest'),
                    method: "POST",
                    data: JSON.stringify({
                        personality: result
                    }),
                    contentType: "application/json",
                    dataType: "json"
                });

                request.done(function(data) {
                    $("#evaluationSuccess").modal();
                    $("#evaluationSuccess").on('hidden.bs.modal', function () {
                        window.location.reload();
                    });
                }).fail(function(e, data) {
                    if (e.status == 422) {
                        var html = [];

                        _.each(e.responseJSON, function (messages) {
                            _.each(messages, function (message) {
                                html.push('<p>'+ message +'</p>');
                            });
                        });

                        html = html.join('');

                        bootbox.dialog({
                            message: html,
                            title: "Có lỗi xảy ra"
                        });
                    } else {
                        $.notify({
                            // options
                            message: 'Có lỗi xảy ra. Vui lòng liên hệ Admin.'
                        },{
                            // settings
                            type: 'danger',
                            z_index: 1140
                        });
                    }
                }).always(function() {

                });
            },

            startAjaxLoading: function () {
                $(".panel-personality-test .ajax-loading").removeClass('hide');
            },

            stopAjaxLoading: function () {
                $(".panel-personality-test .ajax-loading").addClass('hide');
            }
        };

        $(document).ready(function () {
            PersonalityTestFunc.init();
        });
    </script>
@endpush