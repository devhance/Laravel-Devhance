@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="uk-heading-bullet">Users</h3>
            <div class="uk-card uk-card-default">
            <table class="uk-table uk-table-small uk-table-middle ">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Date Registered</th>
                        <th class="uk-table-shrink">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-transform: capitalize;">{{ implode(', ', $user->roles()->get()->pluck('role')->toArray()) }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}" class="uk-button uk-button-default uk-button-small"">Edit</a></td>
                    </tr>
                    @empty 
                        <tr><td colspan="5">There are no available users.</td></tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection