@extends('layouts.app')


@section('content')

<!-- <div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Contact Us</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">First Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Last Name:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Comment:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div> -->






<div id="create-Product-ID">
  
  <h1 style="bold; color:sandybrown;" align="center"  >Ad Post</h1>
  
  <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <div class="col-sm-10">
    <h3 style="color:sandybrown;" >Posting as : {{$name}}</h3>
		</div>
    <br> 
    <div class="col-sm-10">
    <label class="col-sm-10" class="form-control"  for="category_id">Choose Your Category:</label>
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
    <label class="control-label col-sm-8" for="product_name" >Product name:(3-36 characters)</label>
    <input type="text" style="background-color:sandybrown;" class="form-control" name="product_name" id="product_name" required>
    <br>
</div>
<div class="col-sm-10">
    <div class="form-group col-s-12 floating-label-form-group controls">
    <label class="control-label col-sm-8" for="image">Product Image:(png,jpg)</label>
    <input type="file"  style="background-color:sandybrown; padding:2px; margin:2px;" class="form-control" name="image" id="image" required>
    </div>
    </div>
    <br>
    <div class="form-group">
				  <label class="control-label col-sm-2" for="description">Product description:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" style="background-color:sandybrown;" placeholder="Write a short description descrbing the condition of your product. Is it new? Is it used? Share in some sentences so buyers can get an idea....." rows="5" name="description" id="description" required></textarea>
				  </div>
		</div>
    <!-- <label class="control-label col-sm-2" for="description">Product Description:</label>
    <input type="text" class="form-control" rows="5" name="description" id="description" required> -->
    <br>
    <div class="col-sm-10">
    <label class="control-label col-sm-4" for="price">Product Price: (Taka)</label>
    <input type="number" style="background-color:sandybrown;" max="999999" class="form-control" name="price" id="price" required>
    </div>
<br>
<div class="col-sm-10">
    <label class="control-label col-sm-8" for="contact_number">Contact Number:(9-11 digit)</label>
    <input type="number" style="background-color:sandybrown;" max="99999999999" min="011111" class="form-control" name="contact_number" id="Contact Number" required>
    <br>
</div>
    <br>
    
    <div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-warning">Post an Ad</button>
				  </div>
				</div>
  </form>
</div>
@endsection

