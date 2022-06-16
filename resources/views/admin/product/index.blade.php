@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="heading">
        <p class="card-title">All Products</p>
        <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
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
                            <th>Description</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->desc }}</td>
                            <td>
                                @foreach($product->categories as $catgory)
                                    <p>{{ $catgory->title ?? ''}}</p>
                                @endforeach
                            </td>
                            <td><img class="img-thumbnail" src="{{ asset('uploads/'. $product->image) }}" alt="" width="100px"></td>
                            <td>
                                @if($product->status == 1)
                                    <span class="status-active">
                                        Active
                                    </span>
                                @else
                                    <span class="status-inactive">
                                        In Active
                                    </span>
                                @endif
                            </td>
                            <td>{{ date('F j, Y', strtotime($product->created_at)) }}</td>
                            <td>
                                <div class="actions-block">
                                    <a class="btn-edit" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                    @if($product->role != 'admin')
                                        <a class="btn-delete" onclick="event.preventDefault(); document.getElementById('delete-{{ $product->id }}-product').submit();">Delete</a>
                                        <form id="delete-{{ $product->id }}-product" action="{{ route('products.delete', $product->id) }}" method="POST" class="d-none">
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
                                    <td colspan="8">No Products Available</td>
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
