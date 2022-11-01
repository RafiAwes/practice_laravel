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
                            <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">

                            {{-- category part --}}
                            <label for="">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">The default select will be here</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}" @if ($subcategory-> category_id == $cat->id) selected @endif>{{ $cat->category_name }}</option>
                                @endforeach
                            </select>



                            {{-- subcategory part --}}
                            <label>Sub Category</label>
                            <input type="text" name="subcategory_name" class="form-control rounded @error('subcategory_name') is-invalid @enderror" id="subcategory_name" value="{{ $subcategory->subcategory_name }}"
                                required placeholder="Insert Sub Category name">
                                @error('subcategory_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-info text-center rounded" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
           $('#subcategory').on('change', function() {
              var subCategory = $(this).val();
              if(subCategory) {
                  $.ajax({
                      url: '/dropdown/'+subCategory,
                      type: "GET",
                      data : {"_token":"{{ csrf_token() }}"},
                      dataType: "json",
                      success:function(data)
                      {
                        if(data){
                           $('#category').empty();
                           $('#category').append('<option hidden>Choose Course</option>');
                           $.each(data, function(key, category){
                               $('select[name="category"]').append('<option value="'+ key +'">' + category.category_name+ '</option>');
                           });
                       }else{
                           $('#category').empty();
                       }
                    }
                  });
              }else{
                $('#category').empty();
              }
           });
           });
</script>


@endsection
