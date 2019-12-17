@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="uk-heading-bullet">Edit Users</h3>
            @include('inc.messages')
            <div class="uk-card">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @method('PATCH')
                   
                    @foreach ($roles as $role)
                    <label style="text-transform: capitalize;"><input class="uk-checkbox" type="checkbox" name="roles[]" value="{{ $role->id }}"
                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif /> &nbsp;{{ $role->role }}</label><br /><br />
                    @endforeach
                    <div>
                        @csrf 
                        <button type="submit" class="uk-button uk-button-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection