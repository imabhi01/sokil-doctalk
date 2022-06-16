@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="heading">
        <p class="card-title">All Users</p>
        <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
    </div>
    
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! \Session::get('success') !!}</strong> 
        </div>
    @endif
    
    <div class="row">
        <div class="col-12">
            <div class="table-responsive table-bordered">
                <table class="display expandable-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No. #</th>
                            <th>Full Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td><strong class="role-{{$user->role}}">{{ $user->role }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>
                                @if($user->status == 1)
                                    <span class="status-active">
                                        Active
                                    </span>
                                @else
                                    <span class="status-inactive">
                                        In Active
                                    </span>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <div class="actions-block">
                                    <a class="btn-edit" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    @if($user->role != 'admin')
                                        <a class="btn-delete" onclick="event.preventDefault(); document.getElementById('delete-{{ $user->id }}-user').submit();">Delete</a>
                                        <form id="delete-{{ $user->id }}-user" action="{{ route('users.delete', $user->id) }}" method="POST" class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    @endif
                                    @if($user->role == 'doctor')
                                        <a class="btn btn-success" href="{{ route('users.add.profile', $user->id) }}">@if($user->userProfile == null) Add doctor profile @else Update doctor Profile @endif</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                            <div class="empty-row">
                                <tr class="text-center">
                                    <td colspan="8">No Users Available</td>
                                </tr>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
