@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-3 rounded">
                    <div class="card-header rounded bg-success text-white text-center">
                        <h2>Insert Sub-category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/insert/sub/category/') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category</label>
                                {{-- <input type="text" name="category_name" class="form-control rounded @error('category_name') is-invalid @enderror" id="category_name"
                                    required placeholder="Insert Category name">
                                    @error('category_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select One</option>
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sub-Category</label>
                                <input type="text" name="subCategory_name" id="subCategory_name" class="form-control rounded @error('subCategory_name') is-invalid @enderror" required placeholder="Sub-Category">
                                    @error('subCategory_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-info text-center rounded" value="Insert Sub-Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub-Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <th scope="row">{{ $subcategory->id }}</th>
                                    <td>{{ $subcategory->category_name }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>{{ $subcategory->created_at }}</td>
                                    <td><a href="{{url('/edit/sub-category')}}/{{$subcategory->id}}" class="btn btn-warning btn-sm rounded"><i class="fa fa-edit fa-alt"></i></a></td>
                                    <td><a href="{{url('/delete/sub-category')}}/{{$subcategory->id}}" class="btn btn-danger btn-sm rounded"><i class="fa fa-trash fa-alt"></i></a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>

@endsection

