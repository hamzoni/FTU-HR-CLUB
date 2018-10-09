@extends('layouts.user.dashboard.frame', ['hiddenNavbar' => true])

@section('rightContent')
    <div id="dashboard-navbar">
        <a href="{{ route('dashboard.index') }}" class="dashboard-navbar-logo"></a>
    </div>

    <div class="panel panel-dashboard panel-personality-test">
        <div class="panel-heading hide">
            <div id="hrc-comment-cv-clock-container">
                Thời gian còn lại: <span id="hrc-comment-cv-clock-countdown"></span>
            </div>
        </div>

        <div class="panel-body">
            <div class="ajax-loading"></div>

            <div class="hrc-personality-test-questions-container hide" id="hrc-personality-section-start-start">
                <h3 style="padding-top: 0; margin-top: 0;">Vòng 1: Recruitement Test - Vòng 1.1: Test Online</h3>

                <br />

                <div class="finish-test-online hide">
                    @if ($authUser->information)
                        <p>
                            Chúc mừng <b>{{ $authUser->information->fullname }}</b> đã hoàn thành bài thi vòng 1.1: Test Online Ứng viên Tài năng 2016.
                        </p>
                    @else
                        <p>
                            Chúc mừng bạn đã hoàn thành bài thi vòng 1.1: Test Online Ứng viên Tài năng 2016.
                        </p>
                    @endif

                    <p>
                        Kết quả bài thi sẽ được thông báo tới bạn trong <b>tối ngày 17/11/2016</b>.
                    </p>

                    <hr />

                    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdKj0YVicsu_7j6y8WmOPICY9qTA9XMeII5n-15f0hF1GAupw/viewform?embedded=true"
                       width="100%" height="5000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                </div>

                <div class="start-test-online-exam hide">
                    <ul>
                        <li>Ứng viên làm đề thi tuyển dụng dạng <b>Situational Judgement Test</b>.</li>
                        <li>Đề thi gồm <b>8 câu hỏi</b> bằng ngôn ngữ <b>Tiếng Anh</b>.</li>
                        <li>Thời gian làm bài: <b>15 phút</b>.</li>
                        <li>Mỗi ứng viên chỉ có thể làm bài Test Online <b>1 lần duy nhất</b>.</li>
                        <li>Hết thời gian hệ thống sẽ tự động thu lại bài thi của bạn.</li>
                    </ul>

                    <br />

                    <div class="text-center">
                        <button type="button" class="btn btn-next-question" id="btn-start-test-online">Bắt đầu</button>
                    </div>
                </div>

                <div class="answer-test-online-question hide">
                    <p>- Bạn vừa bị gián đoạn khỏi bài thi.</p>
                    <p>- Nhấn vào "thi tiếp" để tiếp tục bài thi.</p>

                    <br />

                    <div class="text-center">
                        <button type="button" class="btn btn-next-question" id="btn-continue-test-online">Thi tiếp</button>
                    </div>
                </div>

                <div class="not-enough-requirement hide">
                    <p>Bạn không đủ điều kiện tham gia vòng 1.1: Test Online Ứng viên Tài năng 2016.</p>
                    <p>Bạn đã không nộp CV tham dự Ứng viên Tài năng 2016 trước 24H ngày 13/11/2016.</p>
                </div>
            </div>

            @foreach (config('hrc.testOnline.questions') as $questionData)
                <div class="hrc-personality-test-questions-container hide" id="hrc-personality-section-question-{{ $questionData['id'] }}">
                    <div class="hrc-personality-test-question">
                        <div class="hrc-personality-test-question-content" style="text-align: left;">
                            <b>Question {{ $questionData['id'] }}/8</b>: {!! $questionData['question'] !!}
                        </div>

                        <div class="hrc-personality-test-question-answer">
                            <ul style="width: 100%; text-align: left;">
                                <li style="width: 100%; height: 100%; text-align: left; margin-bottom: 5px;">
                                    <label style="font-weight: 400;">
                                        <input name="answer_{{ $questionData['id'] }}" data-question-id="{{ $questionData['id'] }}" data-answer="A" type="radio" value="A" /> &nbsp; {!! $questionData['answers']['A'] !!}
                                    </label>
                                </li>

                                <li style="width: 100%; height: 100%; text-align: left; margin-bottom: 5px;">
                                    <label style="font-weight: 400;">
                                        <input name="answer_{{ $questionData['id'] }}" data-question-id="{{ $questionData['id'] }}" data-answer="B" type="radio" value="B" /> &nbsp; {!! $questionData['answers']['B'] !!}
                                    </label>
                                </li>

                                <li style="width: 100%; height: 100%; text-align: left; margin-bottom: 5px;">
                                    <label style="font-weight: 400;">
                                        <input name="answer_{{ $questionData['id'] }}" data-question-id="{{ $questionData['id'] }}" data-answer="C" type="radio" value="C" /> &nbsp; {!! $questionData['answers']['C'] !!}
                                    </label>
                                </li>

                                <li style="width: 100%; height: 100%; text-align: left;">
                                    <label style="font-weight: 400;">
                                        <input name="answer_{{ $questionData['id'] }}" data-question-id="{{ $questionData['id'] }}" data-answer="D" type="radio" value="D" /> &nbsp; {!! $questionData['answers']['D'] !!}
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix">
                <div class="pull-left btn-prev-question-container hide">
                    <button type="button" class="btn btn-prev-question">Câu trước</button>
                </div>

                <div class="pull-right btn-next-question-container hide">
                    <button type="button" class="btn btn-next-question">Câu tiếp</button>
                </div>

                <div class="pull-right btn-final-question-container hide">
                    <button type="button" class="btn btn-next-question">Nộp bài thi</button>
                </div>
            </div>

            <div class="hrc-personality-test-questions-container text-center hide" id="hrc-personality-section-final-final">
                Vui lòng chờ. Kết quả đang được cập nhật.
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script type="text/javascript" src="{{ asset('bower_components/moment.js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/moment.js/moment-timezone.js') }}"></script>

<script type="text/javascript">
    var TestOnlineFunc = {
        questionIndex: 0,
        totalQuestion: 8,
        finishTestOnline: @if ($finishTestOnline) true @else false @endif ,
        startTestOnlineExam: @if ($startTestOnlineExam) true @else false @endif ,
        answerTestOnlineQuestion: @if ($answerTestOnlineQuestion) true @else false @endif ,
        endedTime: @if ($endedTime) '{{ $endedTime }}' @else false @endif ,

        init: function () {
            this.listen();
            this.start();
        },

        listen: function () {
            $("#btn-continue-test-online").on('click', function (e) {
                e.preventDefault();

                TestOnlineFunc.startAjaxLoading();

                TestOnlineFunc.goToQuestion(1);

                TestOnlineFunc.stopAjaxLoading();
            });

            $("#btn-start-test-online").on('click', function (e) {
                e.preventDefault();

                var dialog = bootbox.confirm({
                    title: "Chú ý",
                    message: "Bạn chỉ có thể làm bài Test Online 1 lần duy nhất. Bạn đã sẵn sàng?",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Quay lại.'
                        },
                        confirm: {
                            className: 'color-1',
                            label: '<i class="fa fa-check"></i> Sẵn sàng'
                        }
                    },
                    callback: function (result) {
                        dialog.modal('hide');

                        if (result) {
                            TestOnlineFunc.startAjaxLoading();

                            var request = $.ajax({
                                url: laroute.route('api.testOnline.start'),
                                method: "POST",
                                contentType: "application/json",
                                dataType: "json"
                            });

                            request.done(function(data) {
                                TestOnlineFunc.goToQuestion(1);
                                TestOnlineFunc.startCountdown(data.endTime);
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
                                TestOnlineFunc.stopAjaxLoading();
                            });
                        }
                    }
                });
            });

            $(".btn-next-question-container .btn-next-question").on('click', function (e) {
                e.preventDefault();

                if (TestOnlineFunc.questionIndex != TestOnlineFunc.totalQuestion) {
                    var inputChecked = $("#hrc-personality-section-question-"+ TestOnlineFunc.questionIndex+" .hrc-personality-test-question-answer input:checked");

                    if (inputChecked.length == 0) {
                        var dialog = bootbox.confirm({
                            title: "Chú ý",
                            message: "Bạn chưa trả lời câu hỏi này. Chắc chắc muốn sang câu tiếp theo?",
                            buttons: {
                                cancel: {
                                    label: '<i class="fa fa-times"></i> Suy nghĩ thêm.'
                                },
                                confirm: {
                                    className: 'color-1',
                                    label: '<i class="fa fa-check"></i> Chắc chắn.'
                                }
                            },
                            callback: function (result) {
                                dialog.modal('hide');

                                if (result) {
                                    TestOnlineFunc.goToQuestion(TestOnlineFunc.questionIndex + 1);
                                }
                            }
                        });
                    } else {
                        TestOnlineFunc.goToQuestion(TestOnlineFunc.questionIndex + 1);
                    }
                }
            });

            $(".btn-final-question-container .btn-next-question").on('click', function (e) {
                e.preventDefault();

                var dialog = bootbox.confirm({
                    title: "Chú ý",
                    message: "Bạn có chắc chắn muốn nộp bài thi?",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Quay lại.'
                        },
                        confirm: {
                            className: 'color-1',
                            label: '<i class="fa fa-check"></i> Nộp bài'
                        }
                    },
                    callback: function (result) {
                        dialog.modal('hide');

                        if (result) {
                            TestOnlineFunc.finishExam();
                        }
                    }
                });
            });

            $(".btn-prev-question-container .btn-prev-question").on('click', function (e) {
                e.preventDefault();

                if (TestOnlineFunc.questionIndex != 1) {
                    TestOnlineFunc.goToQuestion(TestOnlineFunc.questionIndex - 1);
                }
            });

            $(".hrc-personality-test-question-answer input").on('click', function (e) {
                var $questionId = $(this).data('question-id');
                var $answerId = $(this).data('answer');

                TestOnlineFunc.answerQuestion($questionId, $answerId);
            });
        },

        finishExam: function () {
            var sendFinishExam = function (city) {
                TestOnlineFunc.startAjaxLoading();

                var request = $.ajax({
                    url: laroute.route('api.testOnline.submit'),
                    method: "POST",
                    contentType: "application/json",
                    dataType: "json",
                    data: JSON.stringify({
                        city: city
                    })
                });

                request.done(function(data) {
                    bootbox.alert({
                        message: 'Chúc mừng bạn đã hoàn thành bài thi vòng 1.1: Test online Ứng viên Tài năng 2016.',
                        title: "Hoàn thành bài thi",
                        callback: function () {
                            window.location.reload();
                        }
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
                    TestOnlineFunc.stopAjaxLoading();
                });
            };

            var dialog = bootbox.dialog({
                title: "Chú ý",
                message: "Nếu vượt qua vòng này, bạn muốn tham gia vòng 1.2 - Test Offline ở đâu?",
                buttons: {
                    confirm: {
                        className: 'color-1',
                        label: '<i class="fa fa-check"></i> Tp.Hồ Chí Minh',
                        callback: function (e) {
                            sendFinishExam('sg');
                        }
                    },
                    confirm2: {
                        className: 'color-1',
                        label: '<i class="fa fa-check"></i> Hà Nội',
                        callback: function (e) {
                            sendFinishExam('hn');
                        }
                    }
                },
                callback: function (result) {
                    dialog.modal('hide');

                    sendFinishExam('other');
                }
            });
        },

        start: function () {
            this.goToQuestion(0);
        },

        goToQuestion: function (questionIndex) {
            this.questionIndex = questionIndex;

            if (questionIndex == 0) {
                this.startAjaxLoading();

                $("#hrc-personality-section-start-start").removeClass('hide');

                if (this.finishTestOnline) {
                    $(".finish-test-online").removeClass('hide');
                } else {
                    if (this.answerTestOnlineQuestion) {
                        $(".answer-test-online-question").removeClass('hide');
                        this.startCountdown(this.endedTime);
                    } else if (this.startTestOnlineExam) {
                        $(".start-test-online-exam").removeClass('hide');
                    } else {
                        $(".not-enough-requirement").removeClass('hide');
                    }
                }

                this.stopAjaxLoading();
            } else {
                $("#hrc-personality-section-start-start").addClass('hide');
                $(".hrc-personality-test-questions-container").addClass('hide');
                $("#hrc-personality-section-question-" + questionIndex).removeClass('hide');

                /*
                 * Buttons
                 */
                $(".btn-next-question-container").removeClass('hide');
                $(".btn-prev-question-container").removeClass('hide');

                if (questionIndex == 1) {
                    $(".btn-prev-question-container").addClass('hide');
                }

                if (questionIndex == this.totalQuestion) {
                    $(".btn-next-question-container").addClass('hide');

                    $(".btn-final-question-container").removeClass('hide');
                } else {
                    $(".btn-final-question-container").addClass('hide');
                }
            }
        },

        answerQuestion: function (questionId, answer) {
            var request = $.ajax({
                url: laroute.route('api.testOnline.answer'),
                method: "POST",
                data: JSON.stringify({
                    question_id: questionId,
                    answer: answer
                }),
                contentType: "application/json",
                dataType: "json"
            });

            request.done(function(data) {
                console.log(data);
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
                        message: 'Có lỗi xảy ra khi trả lời câu hỏi. Vui lòng liên hệ Admin.'
                    },{
                        // settings
                        type: 'danger',
                        z_index: 1140
                    });
                }
            }).always(function() {

            });
        },

        startCountdown: function (time) {
            $(".panel-personality-test .panel-heading").removeClass('hide');

            $("#hrc-comment-cv-clock-countdown").countdown(time, function(event) {
                $(this).text(event.strftime('%M:%S'));
            }).on('finish.countdown', function (e) {
                bootbox.alert({
                    message: 'Thời gian làm bài đã hết.',
                    title: "Chú ý",
                    callback: function () {
                        TestOnlineFunc.finishExam();
                    }
                });
            });
        },

        startAjaxLoading: function () {
            $(".panel-personality-test .ajax-loading").removeClass('hide');
        },

        stopAjaxLoading: function () {
            $(".panel-personality-test .ajax-loading").addClass('hide');
        },

        startBeforeUnloadEvent: function () {
            window.onbeforeunload = function (e) {
                e = e || window.event;

                // For IE and Firefox prior to version 4
                if (e) {
                    e.returnValue = 'Bạn có chắc chắn muốn rời khỏi phòng thi?';
                }

                // For Safari
                return 'Bạn có chắc chắn muốn rời khỏi phòng thi?';
            };
        },

        stopBeforeUnloadEvent: function () {
            window.onbeforeunload = function (e) {};
        }
    };

    $(document).ready(function () {
        TestOnlineFunc.init();
    });
</script>

<script type="text/javascript">
    function disableselect(e) {
        return false
    }

    function reEnable() {
        return true
    }

    document.onselectstart = new Function('return false');

    if (window.sidebar) {
        document.onmousedown = disableselect;
        document.onClick = reEnable
    }
</script>
@endpush