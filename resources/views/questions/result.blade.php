@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="uk-heading-bullet">Search Results</h3>
            <p class="uk-text-meta uk-text-large">{{ $results->count() }} results found.</p>
            <div style="padding-top: 20px;"></div>
            <dl class="uk-description-list uk-description-list-divider">
                @forelse ($results as $result)
                    <dt><a href="{{ route('questions.question.show', $result->id) }}" class="uk-text-bold" style="font-size: 19px;">{{ $result->question }}</a> </dt>
                    <dd class="uk-text-meta">by {{ $result->user_id }} | {{ $result->created_at }}</dd>
                @empty 
                    <div class="ui negative message">
                        Nothing matched your search.
                    </div>
                @endforelse
            </dl>
            {{ $results->links('pagination.uikit') }}
        </div>
    </div>
</div>
@endsection
