@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('inc.messages')
            @error('answer') <div class="ui negative message">{{ $message }}</div> @enderror
            <article class="uk-comment uk-comment-primary">
                <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                    {{-- <div class="uk-width-auto">
                        <img class="uk-comment-avatar" src="images/avatar.jpg" width="80" height="80" alt="">
                    </div> --}}
                    <div class="uk-width-expand"> 
                        <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset uk-text-large" href="#">{{ $question->title }}</a></h4>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li><a href="#">{{ $author->firstname }} {{ $author->lastname }}</a></li>
                            <li><a href="#">{{ $question->created_at }}</a></li>
                            
                        </ul>
                    </div>
                </header>
                <div class="uk-comment-body">
                    <p>{{ $question->question }}</p>
                </div>
                <hr />
                <div class="right">
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li><a href="#modal-reply" uk-toggle>Answer</a></li>
                        <li><a href="#modal-question-report" uk-toggle>Report</a></li>
                    </ul>
                    
                    <div id="modal-reply" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body">
                            <h3 class="uk-modal-title">Answer</h3>
                            <form action="{{ route('questions.answer.store') }}" class="ui form" method="post">
                                <div class="field">
                                    <label>Post your answer</label>
                                    <input type="hidden" name="question_id" value="{{ $question->id }}" />
                                    <textarea name="answer"></textarea>
                                </div>
                                <p class="uk-text-right">
                                    @csrf
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                    <button class="uk-button uk-button-primary" type="submit">Post</button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div id="modal-question-report" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body">
                            <h3 class="uk-modal-title">Report this post?</h3>
                            <p>You can report inappropriate questions and responses like sexual abuse, drugs, crime or violence, offensive words, trolls and any unrelated topics as well as incorrect or not-working answers. Rest assured that your information is strictly confidential.
                            <br /> 
                            
                            <br /> Misuse of this option may result to permanent deactivation of your account.</p>
                            <form action="{{ route('questions.report.store') }}" method="post">
                                <input type="hidden" name="post_id" value="{{ $question->id }}" />
                                <input type="hidden" name="post_type" value="question" />
                                <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}" />
                            <p class="uk-text-right">
                                @csrf
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-danger" type="submit">Report</button>
                            </p>
                            </form>
                        </div>
                    </div>
                </div>
            </article></li>
            
            
            <h3 class="ui horizontal divider transparent" style="margin-top: 60px; margin-bottom: 40px;">Answers</h3>
            {{-- answers --}}
            @forelse ($answers as $answer)
                <div class="ui comments">
                    <div class="comment">
                        <div class="content">
                        <a class="author">{{ $answer->firstname .' '. $answer->lastname }}</a>
                        <div class="text">
                            {{ $answer->answer }}
                        </div>
                        <div class="actions">
                            @if ( $answer->user_id == auth()->user()->user_id )
                                <a href="#modal-edit" class="reply" uk-toggle>Edit</a> | &nbsp;&nbsp;
                            @endif
                            <a href="#modal-answer-report"class="save" uk-toggle>Report</a> | &nbsp;&nbsp;
                            <a class="delete">Delete</a>
                        </div>
                        </div>
                    </div>
                    <hr />
                </div>
            @empty 
                There are no answers for this post yet.
            @endforelse

            {{-- answers modal  --}}
            <div id="modal-edit" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <h3 class="uk-modal-title">Update Answer</h3>
                    <form action="{{ route('questions.answer.update', $answer->id) }}" class="ui form" method="post">
                        @method('PATCH')
                        <div class="field">
                            <textarea name="answer">{{ $answer->answer }}</textarea>
                        </div>
                        <p class="uk-text-right">
                            @csrf
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="submit">Post</button>
                        </p>
                    </form>
                </div>
            </div>

            <div id="modal-answer-report" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <h3 class="uk-modal-title">Report this post?</h3>
                    <p>You can report inappropriate questions and responses like sexual abuse, drugs, crime or violence, offensive words, trolls and any unrelated topics as well as incorrect or not-working answers. Rest assured that your information is strictly confidential.
                    <br /> 
                    
                    <br /> Misuse of this option may result to permanent deactivation of your account.</p>
                    <form action="{{ route('questions.report.store') }}" method="post">
                        <input type="hidden" name="post_id" value="{{ $answer->id }}" />
                        <input type="hidden" name="post_type" value="answer" />
                        <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}" />
                    <p class="uk-text-right">
                    
                        @csrf
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-danger" type="submit">Report</button>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection