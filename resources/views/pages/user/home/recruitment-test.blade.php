@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])

@section('title')
    Test tuyển dụng
@stop

@section('content')
    <div class="container test-container">
        @if (!$hasTest)
            <div class="section overview-intro">
                <br/>
                <h2 class="text-center">Recruitment Test Overview</h2>
                <br/>
                <div class="intro-content">1. This test contains <b>32 multiple-choice questions</b> and <b>a short
                        writing task</b>,
                    divided into five separate sections with different time limits:<br/>
                    <ul>
                        <li>Section 1: Numerical Reasoning Test (8 questions - 10 minutes)</li>
                        <li>Section 2: Logical Reasoning Test (8 questions - 10 minutes)</li>
                        <li>Section 3: Verbal Reasoning Test (8 questions - 15 mnutes)</li>
                        <li>Section 4: Situational Judement Test (8 questions - 10 minutes)</li>
                        <li>Section 5: Your story (estimated 15 minutes)</li>
                    </ul>
                    <br/>
                    So the total amount of time for this test is <b>60 minutes</b>. Make sure that you are seated at a
                    quiet environment so as to complete the test most effectively.
                </div>
                <br/>
                <div class="intro-content">
                    2. <b>REMEMBER:</b>
                    <ul>
                        <li>You can take the test <b>ONLY ONCE</b>. Therefore, once you have taken your test, proceed
                            with it till the end. <b>NEVER turn off the browser</b> while taking the test, or it will
                            affect your test result negatively.
                        </li>
                        <li>When you have finished reading this overview, click on the button <b>“Start”</b> to be
                            directed to the first section of your test.
                        </li>
                    </ul>
                    <br/>
                    <p class="text-center"><b>Good luck!</b></p>
                </div>
                <br/>
                <p class="text-center">
                    <a href="javascript:void(0);" onclick="goToSection(1)" class="btn btn-default btn-join">START</a>
                </p>
            </div>

            <div class="section section-1" data-id="1" style="display: none;">
                <div class="overview-intro">
                    <br/>
                    <h2 class="text-center">Instructions for the Online Numerical Reasoning Test</h2>
                    <br/>
                    <div class="intro-content">
                        The <b>Numerical Reasoning Test</b> measures your numerical knowledge and ability as a tool to
                        make precise decisions. In this test, there will be questions which come in with various forms
                        including number series, word problems and graph/chart interpretation, etc. For each question,
                        you are given some possible answer options.<br>
                        Work out the correct answer to each question using the numerical information provided in the
                        relevant scenario.<br/>
                        <br/><b>REMEMBER:</b><br/>
                        <ul>
                            <li>You have <b>10 minutes</b> to complete <b>8 questions</b>. Please make sure that you
                                will not be disturbed or interrupted while you are taking the test.
                            </li>
                            <li>You will need a calculator, a pen/pencil and rough paper to hand.</li>
                            <li>You will have to work both accurately and quickly to score well. If you are not sure of
                                an answer, mark your best choice and move on. There is only <b>ONE CORRECT ANSWER</b> to
                                each question.
                            </li>
                            <li>Once you have answered a question, you will be able to go back to change your previous
                                answer within the time limit. <b>Use ONLY the Back button at the bottom of the test
                                    page</b> to go back. <b>NEVER turn off the browser</b> while taking the test, or it
                                will affect your test result negatively.
                            </li>
                            <li>When you have finished reviewing these instructions, click on the button <b>“Start”</b>
                                to begin. You can submit your test at anytime by clicking on the <b>“Submit”</b> button
                                at the top right-hand corner. Please note that the test will be automatically submitted
                                after 10 minutes. The time counts down at the top left-hand corner of the screen.
                            </li>
                        </ul>
                        <br/>
                        <p class="text-center"><b>Good luck!</b></p>
                    </div>
                    <br/>
                    <p class="text-center">
                        <a href="javascript:void(0);" onclick="startSection(1);"
                           class="btn btn-default btn-join">START</a>
                    </p>
                </div>
                <div class="question-list" style="display: none">
                    <div class="section-header">
                        <div class="row">
                            <div class="col-md-2">
                                <h2 class="timer text-primary">00:00</h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="text-center">Part 1: Numerical Reasoning Test</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:void(0);" style="margin-top: 15px;"
                                   onclick="confirmSubmit()"
                                   class="btn btn-default btn-join">SUBMIT PART 1</a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <form class="section-data">
                        @foreach ($section1 as $order => $question)
                            @include('pages.user.home.partials.recruitment-test-question')
                        @endforeach
                    </form>
                </div>
                @include('pages.user.home.partials.recruitment-test-navigation')
            </div>

            <div class="section section-2" data-id="2" style="display: none;">
                <div class="overview-intro">
                    <br/>
                    <h2 class="text-center">Instructions for the Online Logical Reasoning Test</h2>
                    <br/>
                    <div class="intro-content">
                        The <b>Logical Reasoning Test</b> features both nonverbal and verbal content, but mostly
                        requiring candidates to interpret and manipulate shapes, numbers and patterns. In this test, you
                        will be given logical scenarios, along which there will be several questions. For each question,
                        you are given some possible answer options.<br/>
                        Work out the correct answer to each question using the numerical information provided in the
                        relevant scenario.
                        <br/><br/>
                        <b>REMEMBER:</b><br/><br/>
                        <ul>
                            <li>You have <b>10 minutes</b> to complete <b>8 questions</b>. Please make sure that you
                                will not be disturbed or interrupted while you are taking the test.
                            </li>
                            <li>You will need a calculator, a pen/pencil and rough paper to hand.</li>
                            <li>You will have to work both accurately and quickly to score well. If you are not sure of
                                an answer, mark your best choice and move on. There is only <b>ONE CORRECT ANSWER</b> to
                                each question.
                            </li>
                            <li>Once you have answered a question, you will be able to go back to change your previous
                                answer within the time limit. <b>Use ONLY the Back button at the bottom of the test
                                    page</b> to go back. <b>NEVER turn off the browser</b> while taking the test, or it
                                will affect your test result negatively.
                            </li>
                            <li>When you have finished reviewing these instructions, click on the button <b>“Start”</b>
                                to begin. You can submit your test at anytime by clicking on the <b>“Submit”</b> button
                                at the top right-hand corner. Please note that the test will be automatically submitted
                                after 10 minutes. The time counts down at the top left-hand corner of the screen.
                            </li>
                        </ul>
                        <br/>
                        <p class="text-center"><b>Good luck!</b></p>
                    </div>
                    <br/>
                    <p class="text-center">
                        <a href="javascript:void(0);" onclick="startSection(2);"
                           class="btn btn-default btn-join">START</a>
                    </p>
                </div>
                <div class="question-list" style="display: none">
                    <div class="section-header">
                        <div class="row">
                            <div class="col-md-2">
                                <h2 class="timer text-primary">00:00</h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="text-center">Part 2: Logical Reasoning Test</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:void(0);" style="margin-top: 15px;"
                                   onclick="confirmSubmit()"
                                   class="btn btn-default btn-join">SUBMIT PART 2</a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <form class="section-data">
                        @foreach ($section2 as $order => $question)
                            @include('pages.user.home.partials.recruitment-test-question')
                        @endforeach
                    </form>
                </div>
                @include('pages.user.home.partials.recruitment-test-navigation')
            </div>

            <div class="section section-3" data-id="3" style="display: none;">
                <div class="overview-intro">
                    <br/>
                    <h2 class="text-center">
                        Instructions for the Online Verbal Reasoning Test</h2>
                    <br/>
                    <div class="intro-content">The <b>Verbal Reasoning Test</b> assesses your understanding and
                        comprehension
                        skills, as well as your English capability. Therefore, the test format is designed to test your
                        English proficiency and verbal reasoning ability (the latter is prioritized). You are expected
                        to go
                        through several short passages, each presenting a different topic and accompanied by several
                        questions.
                        <br/><br/>
                        <b>REMEMBER:</b><br/><br/>

                        <ul>
                            <li>You have <b>15 minutes</b> to complete <b>8 questions</b>. Please make sure that you
                                will not be disturbed or interrupted while you are taking the test.
                            </li>
                            <li>You will need a calculator, a pen/pencil and rough paper to hand.</li>
                            <li>You will have to work both accurately and quickly to score well. If you are not sure of
                                an answer, mark your best choice and move on. there is only <b>ONE CORRECT ANSWER</b> to
                                each question.
                            </li>
                            <li>Once you have answered a question, you will be able to go back to change your previous
                                answer. <b>Use ONLY the Back button at the bottom of the test page</b> to go back. <b>DO
                                    NOT use the Back button on your browser</b> as this may interfere with your test.
                            </li>
                            <li>When you have finished reviewing these instructions, click on the button <b>“Start”</b>
                                to begin. You can submit your test at anytime by clicking on the <b>“Submit”</b> button
                                at the top right-hand corner. Please note that the test will be automatically submitted
                                after 15 minutes. The time counts down at the top left-hand corner of the screen.
                            </li>
                        </ul>
                        <br/>
                        <p class="text-center"><b>Good luck!</b></p>
                    </div>
                    <br/>
                    <p class="text-center">
                        <a href="javascript:void(0);" onclick="startSection(3);"
                           class="btn btn-default btn-join">START</a>
                    </p>
                </div>
                <div class="question-list" style="display: none">
                    <div class="section-header">
                        <div class="row">
                            <div class="col-md-2">
                                <h2 class="timer text-primary">00:00</h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="text-center">Part 3: Verbal Reasoning Test</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:void(0);" style="margin-top: 15px;"
                                   onclick="confirmSubmit()"
                                   class="btn btn-default btn-join">SUBMIT PART 3</a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <form class="section-data">
                        @foreach ($section3 as $order => $question)
                            @include('pages.user.home.partials.recruitment-test-question')
                        @endforeach
                    </form>
                </div>
                @include('pages.user.home.partials.recruitment-test-navigation')
            </div>

            <div class="section section-4" data-id="4" style="display: none;">
                <div class="overview-intro">
                    <br/>
                    <h2 class="text-center">Instructions for the Online Situational Judgement Test</h2>
                    <br/>
                    <div class="intro-content">
                        The <b>Situational Judgement Test</b> assesses how you approach situations encountered in the
                        workplace. The test format typically present you with a written description of a scenario and
                        ask you to select the appropriate response from a multiple choice list to answer the questions.
                        <br/><br/>
                        <b>REMEMBER:</b><br/><br/>

                        <ul>
                            <li>You have <b>10 minutes</b> to complete <b>8 questions</b>. Please make sure that you
                                will not be disturbed or interrupted while you are taking the test.
                            </li>
                            <li>You will need a pen/pencil and rough paper to hand.</li>
                            <li>You will have to work both accurately and quickly to score well. If you are not sure of
                                an answer, mark your best choice and move on. there is only <b>ONE CORRECT ANSWER</b> to
                                each question.
                            </li>
                            <li>Once you have answered a question, you will be able to go back to change your previous
                                answer. <b>Use ONLY the Back button at the bottom of the test</b> page to go back. <b>NEVER
                                    turn off the browser</b> while taking the test, or it will affect your test result
                                negatively.
                            </li>
                            <li>When you have finished reviewing these instructions, click on the button <b>“Start”</b>
                                to begin. You can submit your test at anytime by clicking on the <b>“Submit”</b> button
                                at the top right-hand corner. Please note that the test will be automatically submitted
                                after 10 minutes. The time counts down at the top left-hand corner of the screen.
                            </li>
                        </ul>
                        <br/>
                        <p class="text-center"><b>Good luck!</b></p>
                    </div>
                    <br/>
                    <p class="text-center">
                        <a href="javascript:void(0);" onclick="startSection(4);"
                           class="btn btn-default btn-join">START</a>
                    </p>
                </div>
                <div class="question-list" style="display: none">
                    <div class="section-header">
                        <div class="row">
                            <div class="col-md-2">
                                <h2 class="timer text-primary">00:00</h2>
                            </div>
                            <div class="col-md-8">
                                <h2 class="text-center">Part 4: Situational Judgement Test</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:void(0);" style="margin-top: 15px;"
                                   onclick="confirmSubmit()"
                                   class="btn btn-default btn-join">SUBMIT PART 4</a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <form class="section-data">
                        @foreach ($section4 as $order => $question)
                            @include('pages.user.home.partials.recruitment-test-question')
                        @endforeach
                    </form>
                </div>
                @include('pages.user.home.partials.recruitment-test-navigation')
            </div>

            <div class="section section-5" data-id="5" style="display: none;">
                <div class="section-header">
                    <div class="row">
                        <div class="col-md-2">
                            <h2 class="timer text-primary">00:00</h2>
                        </div>
                    </div>
                </div>
                <br/>
                <p>
                    <b>Just one more step to finish the test:</b><br/><br/>
                    We are now looking for an impactful candidate, who not only qualifies in specialized abilities but can manage, learn and grow by going through hardship. So please spare some minutes to answer below question (if you do not have a story or do not want to share, please click on “<b>Submit</b>” button)
                    <br/><br/>
                    Have you ever been in a period that made you feel extremely depressed or hopeless when you were a university student? What happened then? How did you make it through?
                </p><br/>
                <form class="section-data">
                    <textarea name="final_question" class="form-control" rows="10"></textarea>
                </form>
                <p class="text-center">
                    <a href="javascript:void(0);" style="margin-top: 15px;"
                       onclick="confirmSubmit()"
                       class="btn btn-default btn-join">SUBMIT</a>
                </p>
            </div>
        @endif
        <div class="section section-0" data-id="0" @if(!$hasTest)style="display: none;"@endif>
            <div style="width: 440px;margin:auto;">
                <br/><br/>
                <h2 class="text-center">Congratulations!</h2><br/>
                <p>
                    You have finished your first round: CV Screening and Recruitment
                    Test. The result will be sent to your email after the closing date
                    19/11/2017.
                </p>
                <p>Follow our social channels for the latest updates</p>
                <div class="text-center">
                    <a href="https://www.facebook.com/hrc.ungvientainang/" target="blank" class="btn btn-default share-result"
                       style="color: #5151a3;"><i class="fa fa-facebook-square"></i> FANPAGE</a>&nbsp;&nbsp;&nbsp;
                    <a href="/articles" target="blank" class="btn btn-default" style="color: #20a286;"><i
                                class="fa fa-globe"></i> WEBSITE</a>
                </div>
                <br/>
                <p class="text-center">Thank you!</p>
            </div>
        </div>
    </div>

    <div class="modal hrc-modal" id="confirmSubmitModel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModelLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-modal-close" data-dismiss="modal" aria-label="Close"></button>

                    <div class="modal-body-wrapper">
                        <p class="hrc-modal-authorize-heading-1">
                            Bạn có chắc chắn muốn nộp bài?
                        </p>
                        <p class="text-center">
                        <button type="submit" class="btn btn-primary btn-hrc-1 btn-user-idle-ready" onClick="agreeSubmit();">Đồng ý</button>
                        &nbsp;
                        <button type="submit" data-dismiss="modal" class="btn btn-default btn-user-idle-no-ready">Không</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('styles')
<style>
    .test-container {
        min-height: 600px;
    }

    a.btn.btn-circle {
        background: #333;
        border-radius: 100%;
        width: 30px;
        height: 30px;
        padding: 6px;
        line-height: 1;
        color: #20a286;
        border: solid 1px #282828;
    }

    a.btn.btn-thickness {
        border: solid 1px #b8b8b8;
        border-radius: 20px;
        margin-right: 10px;
        color: #b8b8b8;
    }

    a.btn.btn-thickness.active {
        border: solid 1px #b8b8b8;
        color: #fff;
        background: #b8b8b8;
    }

    span.counter {
        color: #b8b8b8;
    }

    .section {
        height: 100%;
        position: relative;
        margin-bottom: 150px;
    }

    .test-navigation {
        position: absolute;
        bottom: -100px;
    }

    .question-list {
        position: relative;
        height: 100%;
    }
</style>
@endpush
@push('scripts')
<script type="text/javascript">
    window.onhashchange = function() {
        return false;
    }

    var currentSection = 0;
    var currentQuestion = 0;
    var timeLeft = 0;
    var timer;
    function goToSection(number) {
        $('.section').hide();
        $('.section-' + number).show();
        if (number == 5) startSection(5);

        if(number == 1){
            $.ajax({
                type: 'POST',
                url: '{!! action('User\Hrc\RecruitmentTestController@makeTest') !!}',
                data: {},
                success: function () {

                },
                error: function(){

                }
            });
        }
    }

    function startSection(number) {
        currentSection = $('.section-' + number);
        currentSection.find('.overview-intro').hide();
        currentSection.find('.question-list').show();
        currentSection.find('.test-navigation').show();
        timeLeft = 600;
        if (number == 3 || number == 5) {
            timeLeft = 900;
        }

        clearInterval(timer);
        timer = setInterval(function () {
            timeLeft = timeLeft - 1;
            currentSection.find('.timer').html(fancyTimeFormat(timeLeft));
            if (timeLeft == 0) {
                alert('Đã hết giờ làm bài');
                stopTest();
            }
        }, 1000);
        goToQuestion(1);
    }

    function stopTest() {
        submitSection();
        clearInterval(timer);
    }

    function goToQuestion(number) {
        currentQuestion = number;
        currentSection.find('.question').hide();
        currentSection.find('.question-' + number).show();
        currentSection.find('.btn-thickness').removeClass('active');
        currentSection.find('.btn-question-' + number).addClass('active');
        currentSection.find('.counter .current-question').html(number);
    }

    function prevQuestion() {
        if (currentQuestion > 1)
            goToQuestion(currentQuestion - 1);
    }

    function nextQuestion() {
        if (currentQuestion < 8)
            goToQuestion(currentQuestion + 1);
    }

    function confirmSubmit(){
        $('#confirmSubmitModel').modal('show');
    }

    function agreeSubmit(){
        $('#confirmSubmitModel').modal('hide');
        stopTest();
    }

    function submitSection() {
        var result = currentSection.find('.section-data').serializeArray();
        var sectionId = currentSection.attr('data-id');
        currentSection.find('.btn-join').addClass('disabled');
        $.ajax({
            type: 'POST',
            url: '{!! action('User\Hrc\RecruitmentTestController@submitTest') !!}',
            data: {result: result, section: sectionId},
            success: function () {
                var nextSection = sectionId < 5 ? parseInt(sectionId) + 1 : 0;
                currentSection.remove();
                goToSection(nextSection);
            },
            error: function(){
                currentSection.find('.btn-join').removeClass('disabled');
            }
        });
    }

    function fancyTimeFormat(time) {
        // Hours, minutes and seconds
        var hrs = ~~(time / 3600);
        var mins = ~~((time % 3600) / 60);
        var secs = time % 60;

        // Output like "1:01" or "4:03:59" or "123:03:59"
        var ret = "";

        if (hrs > 0) {
            ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
        } else {
            ret += (mins < 10 ? "0" : "");
        }

        ret += "" + mins + ":" + (secs < 10 ? "0" : "");
        ret += "" + secs;
        return ret;
    }
</script>
@endpush