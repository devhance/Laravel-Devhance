@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="uk-heading-bullet">List of Questions</span></h3>
            
            <div style="padding-top: 20px;"></div>
            <dl class="uk-description-list uk-description-list-divider">
                @forelse ($questions as $question)
                    <dt><a href="{{ route('questions.question.show', $question->id) }}" class="uk-text-bold" style="font-size: 19px;">{{ $question->question }}</a> </dt>
                    <dd class="uk-text-meta">by {{ $question->user_id }} | {{ $question->created_at }}</dd>
                @empty 
                    <div class="ui negative message">
                        There are no questions yet.
                    </div>
                @endforelse
            </dl>
            {{ $questions->links('pagination.uikit') }}
        </div>
    </div>
</div>
@endsection
