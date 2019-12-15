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
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><button class="uk-button uk-button-default uk-button-small" uk-toggle="target: #my-id">Edit</button></td>
                    </tr>
                    @empty 
                        <tr><td colspan="5">There are no available users.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div id="my-id" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <h4 class="uk-modal-title">Update Roles</h4>
                    <hr />
                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                        <label><input class="uk-checkbox" type="checkbox" checked> User</label>
                        <label><input class="uk-checkbox" type="checkbox"> Master</label>
                        <label><input class="uk-checkbox" type="checkbox"> Undefined</label>
                        <label><input class="uk-checkbox" type="checkbox"> Admin</label>
                    </div>
                    <div>
                        <form action="{{ route('admin.users.update', $user->user_id) }}"></form>
                        <button type="submit" class="uk-button uk-button-primary">Save</button>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </div>

@endsection