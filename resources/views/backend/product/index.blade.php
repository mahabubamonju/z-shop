@extends('backend.master')

@section('content')
    <div class="container-fluid pt-4 px-4">

        <div class="row g-4">
            <div class="col-12">
                <h1 class="text-center my-4">All Products (Total {{ $products->count() }})</h1>
                @if (Session::get('notification'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('notification') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No:</th>
                            <th scope="col"># id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img src="{{ asset('/') }}{{$product->image}}" alt="" height="50" width="70"></td>
                                <td>
                                    <a href="{{route('edit',$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('delete-products',$product->id) }}" class="btn btn-sm btn-danger ms-2">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
