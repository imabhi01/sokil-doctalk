@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="heading">
        <p class="card-title">All Categories</p>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="status-active">
                                        Active
                                    </span>
                                @else
                                    <span class="status-inactive">
                                        In Active
                                    </span>
                                @endif
                            </td>
                            <td>{{ date('F j, Y', strtotime($category->created_at)) }}</td>
                            <td>
                                <div class="actions-block">
                                    <a class="btn-edit" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                    @if($category->role != 'admin')
                                        <a class="btn-delete" onclick="event.preventDefault(); document.getElementById('delete-{{ $category->id }}-category').submit();">Delete</a>
                                        <form id="delete-{{ $category->id }}-category" action="{{ route('categories.delete', $category->id) }}" method="POST" class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                            <div class="empty-row">
                                <tr class="text-center">
                                    <td colspan="8">No categories Available</td>
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
