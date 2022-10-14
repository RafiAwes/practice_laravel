@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-3 rounded">
                    <div class="card-header rounded bg-warning text-white text-center">
                        <h2>Edit category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/update/category/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="category_id" value="{{ $data->id }}">
                                <label>Category</label>
                                <input type="text" name="category_name" class="form-control rounded @error('category_name') is-invalid @enderror" id="category_name" value="{{ $data->category_name }}"
                                    required placeholder="Insert Category name">
                                    @error('category_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-info text-center rounded" value="Update Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
