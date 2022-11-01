@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <div class="card mt-3">
                    <div class="card-header bg-success text-bold text-center text-white rounded">
                        <h2>Insert Product Data</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add/product/') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            <option value="">Select One</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product" class="form-control" id="product" placeholder="Product" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea name="description" class="ckeditor  form-control" id="description" placeholder="Description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Image:</label>
                                    <input type="file"  name="image" onchange="document.getElementById('bah').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                                    <img id="bah" class="img-fluid mt-1">
                                </div>
                                <div class="col-lg-4">
                                    <label>Stock</label>
                                    <input type="number" name="stock" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <label>Price(Taka)</label>
                                    <input type="number" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 text-center">
                                    <input type="submit" value="Submit Query" class="btn btn-success rounded">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection
