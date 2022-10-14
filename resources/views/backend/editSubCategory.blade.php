@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card  mt-3">
                <div class="card-header bg-warning text-center rounded">
                    <div class="text-white">
                        <h1>Edit Subcategory</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/update/category/') }}" method="post">
                        @csrf
                        <div class="form-group">
                            {{-- hidden part --}}
                            <input type="hidden" name="category_id" value="">

                            {{-- category part --}}
                            <label for="">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">The default select will be here</option>
                                @foreach ($subcategories as $subcat)
                                    <option value="{{ $subcat->category_id }}">{{ $subcat->category_name }}</option>
                                @endforeach
                            </select>



                            {{-- subcategory part --}}
                            <label>Sub Category</label>
                            <input type="text" name="sub_category_name" class="form-control rounded @error('sub_category_name') is-invalid @enderror" id="sub_category_name" value=""
                                required placeholder="Insert Sub Category name">
                                @error('sub_category_name')
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