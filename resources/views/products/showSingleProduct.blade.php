@extends('layouts.app')


@section('content')
<div class="wrapper">
    <div class="content">
    <div class="links m-b-md">
                    <a href="/" class="button button1">Home</a>
                    <a href="{{route('products.myadds')}}" class="button button1">My Ads</a>
                    <a href="/about" class="button button1">Edit Profile</a>
                </div>
    </div>
                
                <div class="wrapper create-product" >
                    <h1 align="center">{{ $item->product_name }}</h1>
                    <h3 align="center">by {{ $item->user_name}}</h3>
                    <h3 align="center">Product category : {{$item->category_id}}</h3>
                    <div style="display: flex; justify-content: center;" >
                    <img src="{{URL::to($item->image)}}" class="single-image" >
                    </div>
                    <div class="wrapper create-product" >
                    <p class="description"> <b>Description:  </b>{{$item->description}}</p>
                    <p class="price" >Price : <b>{{$item->price}}</b> taka</p>
                    <p class="contact">Contact Number : <b>{{$item->contact_number}}</b></p>
                    </div>
                    <div align="center">
                    @if(isset($favorite))
                        <h4 align="center">[Added to Favourite]</h4>
                        <a href="{{route('products.myfavorites')}}" class="button button1">Go to Favorites</a>

                    @else
                        <a href="{{ route('products.addFavorite', ['id_number'=>$item->id]) }}" class="button button1">Add to Favourite</a>

                    @endif
                    <a href="/products/buy/{{$item->category_id}}" class="button button1">Back to {{$item->category_id}} page</a>
                    </div>
                </div>
                
                
                
            </div>
        </div>

        <!-- <div class="wrapper create-product" class="product_data">
            

                
                
                <div class="wrapper product-details">
                    <h1>{{ $item->product_name }}</h1>
                    <h3>by {{ $item->user_name}}</h3>
                    <h1>Category : {{$item->category_id}}</h1>
                    <img src="{{URL::to($item->image)}}" style="height: 800 px; width: 300px; margin=0px auto; border: 1px solid #ddd;
                     border-radius: 4px; padding: 5px; alignment: center;">
                    <p class="description">{{$item->description}}</p>
                    <p class="price">Price : {{$item->price}}</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p> -->
                    <!-- <a href="{{ route('products.showSingleProduct', ['id_number'=>$item->id]) }}" class="btn btn-sm btn-success">View Details</a> -->
                <!-- </div> -->
             <!-- @if(isset($favorite))
                
                Added to Favorite
                <a href="{{route('products.myfavorites')}}" class="btn btn-sm btn-success">Go to Favorites</a>
                
             
            @else
            <a href="{{ route('products.addFavorite', ['id_number'=>$item->id]) }}" class="btn btn-sm btn-success">Add to Favorite</a>
                
            
                @endif -->
                <!-- <h1><a href="/products/buy/{{$item->category_id}}">Back to {{$item->category_id}} page</a></h1> -->
            
            <!-- </div>
        </div> -->
        
@endsection
<!-- @push('script')
<script type="text/javascript">
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        var id = $("input[name=product_id]").val();
        var data = $(this).serialize();
        console.log(data);
        var url = '{{ url::to('/products/showSingleProduct/') }}' 

        $.ajax({
           url:url,
           method:'POST',
           data:data,
           success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});
</script>
@endpush -->

	
	