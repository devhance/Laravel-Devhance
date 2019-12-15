@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <article class="uk-comment uk-comment-primary">
                <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-comment-avatar" src="images/avatar.jpg" width="80" height="80" alt="">
                    </div>
                    <div class="uk-width-expand">
                        <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Author</a></h4>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li><a href="#">12 days ago</a></li>
                            <li><a href="#">Reply</a></li>
                        </ul>
                    </div>
                </header>
                <div class="uk-comment-body">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
            </article>

        </div>
    </div>
</div>
@endsection