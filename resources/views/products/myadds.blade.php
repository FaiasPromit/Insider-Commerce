@extends('layouts.app')


@section('content')
        
        <div class="content">
            <div class="title m-b-md">
            Ads Posted by {{$user_name}}
            </div>
            <div class="links m-b-md">
                <a href="/" class="button button1">Home</a>
                <a href="{{route('products.myfavorites')}}" class="button button1">My Favourites</a>
                <a href="/about" class="button button1">Edit Profile</a>
            </div>
        </div>
        <div class="box-buy-products">
        @foreach($product as $item)
            <div class="wrapper">
                <div class="card-buy-products">
                    <img src="{{URL::to($item->image)}}" alt="Avatar" class="img-buy-products">
                    <h1>{{ $item->product_name }}</h1>
                    <!-- <h3>by {{ $item->user_name}}</h3> -->
                    <p class="price">Price : {{$item->price}} taka</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    <p class="card-text">Desciption: {!! \Illuminate\Support\Str::limit($item->description, 100, '...') !!}</p>
                    <?php $id_number=$item->id?>
                    <a href="{{ route('products.showSingleProduct', ['id_number'=>$item->id]) }}" class="button button1">View Details</a>
                    <a href="{{ route('products.edit', ['id_number'=>$id_number]) }}" class="button button4">Edit</a>
                    <a href="{{route('products.delete',['id_number'=>$id_number])}}" class="button button3">Delete</a>
                </div>
            </div>
        @endforeach
        </div>
        <div class="btn  float-middle col-rd-6">
        <h3 class="float-middle ">{{$product->links('pagination::bootstrap-4')}}</h3>
        
        </div> 
        <div class="btn btn-warning float-right col-rd-6">
        <a class="float-middle" href="#" style="color:red; background-color:sandybown;">More Products &rarr;</a>
        </div> 
        
@endsection

<!-- <div class="wrapper create-product">
            

            <div class="content">
                <div class="title m-b-md">
                    Ads Posted by {{$user_name}}
                    
                </div>

                </div>

                @foreach($product as $item)
                
                <div class="wrapper product-details">
                    <h1>Product Name :{{ $item->product_name }}</h1>
                    <h3>Posted by {{ $item->user_name}}</h3>
                    <p class="description">Product DEscription : {{$item->description}}</p>
                    <p class="price">Price : {{$item->price}}</p>
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    <img src="{{URL::to($item->image)}}" style="height: 1000 px; width: 500px; margin=0px auto; border: 1px solid #ddd;
                     border-radius: 4px; padding: 5px; alignment: center;"> -->
                    <!-- <br> -->
                    <!-- <p class="id">Contact Number : {{$id_number}}</p> -->
                    <!-- <a href="{{ route('products.edit', ['id_number'=>$id_number]) }}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{route('products.delete', ['id_number'=>$id_number])}}" class="btn btn-sm btn-danger">Delete</a>
                    
                    

                </div>
                
                @endforeach
                {{$product->links('pagination::bootstrap-4')}} -->
                <!-- Pager -->
                <!-- <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">More Products &rarr;</a>
                </div>

                <h1>Nothing is here for now!</h1>
            </div>
        </div> -->