@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="ui top attached header center">Dashboard</h3> 
                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @error('question') <div class="tiny ui negative message"><div class="header">{{ $message }}</div> </div>@enderror
                    <a class="small ui basic blue button" href="#modal-post" uk-toggle>Post a Question</a>
                    <a class="small ui basic green button" href="#modal-full" uk-toggle>Search</a>
                    {{--  post modal --}}
                    <div id="modal-post" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="uk-modal-header">
                                <h2 class="uk-modal-title">Post A Question</h2>
                            </div>
                            <form action="{{ route('questions.question.store') }}" class="ui form" method="post">
                            <div class="uk-modal-body">
                            <div class="field">
                                <label>Write your question on the field below</label>
                                <textarea name="question"></textarea>
                            </div>
                            </div>
                            <div class="uk-modal-footer uk-text-right">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                @csrf
                                <button class="uk-button uk-button-primary" type="submit">Post</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    {{-- end modal  --}}
                    

                    {{-- search modal  --}}
                    <div id="modal-full" class="uk-modal-full uk-modal" uk-modal>
                        <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
                            <button class="uk-modal-close-full" type="button" uk-close></button>
                            <form class="uk-search uk-search-large" action="{{ route('questions.question.index') }}">
                                <input class="uk-search-input uk-text-center" name="search" type="search" placeholder="Search..." autofocus>
                                @csrf
                            </form>
                        </div>
                    </div>

                    {{-- end modal  --}}

                    <div style="padding-top: 30px;"></div>
                    <h5 class="ui dividing header">Update Profile</h5>
                    <form action="" class="ui form" style="max-width: 500px;" method="post">
                        @method('PATCH')
                        <div class="two fields">
                            <div class="field"> 
                                <label>New Password</label>
                                <input type="password" name="password" placeholder="New Password">
                            </div>
                            <div class="field"> 
                                <label>Confirm Password</label>
                                <input type="password" name="confirm" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="field">
                            <label>Change Email Address</label>
                            <input type="email" name="email" placeholder="Email Address">
                        </div>
                        
                        @csrf 
                        <button type="submit" class="uk-button uk-button-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
