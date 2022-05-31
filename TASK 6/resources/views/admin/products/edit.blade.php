@extends('admin.layouts.app')
@section('title','Edit Product')
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Product Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{route('dashboard.products.update',['product_id'=> $products->id])}}" enctype="multipart/form-data">
        @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col-6">
                        <label for="name_en">Product Name(EN)</label>
                        <input type="text" name="name_en" class="form-control" id="name_en" value = "{{$products->name_en}}">
                    </div>
                    <div class="col-6">
                        <label for="name_ar">Product Name(AR)</label>
                        <input type="text" name="name_ar" class="form-control" id="name_ar" value = "{{$products->name_ar}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="code">Code</label>
                        <input type="number" name="code" class="form-control" id="code" value = "{{$products->code}}">
                    </div>
                    <div class="col-4">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" value = "{{$products->price}}">
                    </div>
                    <div class="col-4">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" value = "{{$products->quantity}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <label for="status">Status</label>
                        <select name = "status" id ="status" class = "form-control">
                            <option value = "1">Active</option>
                            <option value = "0">Not Active</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="brand_id">Brand</label>
                        <select name = "brand_id" id ="brand_id" class = "form-control">
                        <option value = "">No Brand</option>
                            @foreach($brands as $brand)
                                <option @selected($brand->id == $products->brand_id)  value = "{{$brand->id}}">{{$brand->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="subcategory_id">Sub Category</label>
                        <select name = "subcategory_id" id ="subcategory_id" class = "form-control">
                            @foreach($subcategories as $subcategory)
                                <option @selected($subcategory->id == $products->subcategory_id) value = "{{$subcategory->id}}">{{$subcategory->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="details_en">Details (EN)</label>
                        <textarea name = "details_en" id = "details_en" class = "form-control" cols ="" rows = "">{{$products->details_en}}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="details_ar">Details (AR)</label>
                        <textarea name = "details_ar" id = "details_ar" class = "form-control" cols ="" rows = "">{{$products->details_ar}}</textarea>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-6">
                        <label for="file"><img id = "image" src = "{{$products->image ? asset('dist/img/'.$products->image) : asset('dist/img/default.png') }}" style ="cursor:pointer;" ></label>
                        <input Type = "file" name = "image" id = "file" onchange="loadImage(event)" class = "d-none">
                    </div>
                </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update </button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('js')
<script>
    var loadImage = function(event) {
        var output = document.getElementById('image');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

</script>
@endsection

