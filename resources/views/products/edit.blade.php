@extends('layouts.app')


@section('content')
<div id="create-Product-ID">
<h1 style="bold; color:sandybrown;" align="center"  >Update Your Ad</h1>
  
  <form action="{{ route('products.update', ['id_number'=>$id_number]) }}" method="POST" enctype="multipart/form-data">
    @csrf
   <br>
   <div class="col-sm-10">
      <label for="category_id" class="col-sm-10" class="form-control">Choose Your Category:</label>
      <select class="control-label col-sm-20" style="background-color:sandybrown;" name="category_id" id="category_id">
        <option value="Home appliances">Home Appliances</option>
        <option value="Question banks">Question Banks</option>
        <option value="Books">Books</option>
        <option value="Music instruments">Music Instruments</option>
        <option value="Sports instruments">Sports Instruments</option>
        <option value="Lab equipments">Lab Equipments</option>
        <option value="Electronics">Electronics</option>
      </select>
  </div>
    <br>
  <div class="col-sm-10">
    <label class="control-label col-sm-8" for="product_name">Product name:(3-36 characters)</label>
    <input type="text" style="background-color:sandybrown;" class="form-control" value="{{$product->product_name}}" name="product_name" id="product_name"  required>
  </div>
    <br>
    <div class="col-sm-10">
      <div class="form-group col-s-12 floating-label-form-group controls">
    <label class="control-label col-sm-8" for="image">Upload New Image: </label>
    <input type="file" style="background-color:sandybrown; padding:2px; margin:2px;" class="form-control" value="{{URL('$product->image')}}" class="form-control" name="image" id="image"   >
    <input type="hidden" name="old_photo" value="{{ $product->image }}"
    <br>
    <br>
    <h6 align="center">Old Image</h6>
    <br>
    <div style="display: flex;justify-content: center;"> 
    <img class="img-buy-products" src="{{URL::to($product->image)}}">
    </div>
    <br>
    </div>
    </div>
    <br>
    <div class="form-group">
    <label class="control-label col-sm-2" for="description">Product Description:</label>
    <div class="col-sm-10">
    <!-- <input type="text"  value="{{$product->description}}" name="description" id="description" required> -->
    <textarea  class="form-control" style="background-color:sandybrown;" rows="5"  name="description" id="description" required>{{$product->description}}</textarea>
    </div>
    </div>
    <br>
    <div class="col-sm-10">
    <label class="control-label col-sm-4" for="price">Product Price:</label>
    <input type="number" style="background-color:sandybrown;" class="form-control" value="{{$product->price}}" name="price" id="price" required>
    </div>
    <br>
    <div class="col-sm-10">
    <label class="control-label col-sm-2" for="contact_number">Contact Number</label>
    <input type="number" style="background-color:sandybrown;" class="form-control" value="{{$product->contact_number}}" name="contact_number" id="Contact Number" required>
</div>
    <br>
    <br>
    
    <div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-warning">Update Your Ad</button>
				  </div>
				</div>
  </form>
</div>
@endsection