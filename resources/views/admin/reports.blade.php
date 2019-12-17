@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="uk-heading-bullet">Reported Posts  | <span class="uk-text-meta uk-text-large">{{ $reports->count() }} reports found.</span></h3>
            
            <div style="padding-top: 20px;"></div>
            <dl class="uk-description-list uk-description-list-divider">
                @forelse ($reports as $report)
                    <dt><a href="{{ route('questions.question.show', $report->id) }}" class="uk-text-bold" style="font-size: 19px;">{{ $report->question }}</a> </dt>
                    <dd class="uk-text-meta">by {{ $report->user_id }} | {{ $report->created_at }}</dd>
                @empty 
                    There are no posts reported.
                @endforelse
            </dl>
            {{ $reports->links('pagination.uikit') }}
        </div>
    </div>
</div>
@endsection