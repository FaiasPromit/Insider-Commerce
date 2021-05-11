@extends('layouts.app')


@section('content')
        
            <div class="content">

                <div class="title m-b-md">
                    My Favourites
                </div>

                <div class="links m-b-md">
                    <a href="/" class="button button1">Home</a>
                    <a href="{{route('products.myadds')}}" class="button button1">My Ads</a>
                    <a href="/about" class="button button1">Edit Profile</a>
                </div>
            </div>

<div class="wrapper">
    @foreach($product as $item)
        @foreach($favorite as $n)   
            @if($item->id==$n)
                <div class="wrapper">
                    <div class="wrapper create-product">
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
                        
                    <!-- <div align="center">
                    @if(isset($favorite))
                        <h4 align="center">[Added to Favourite]</h4>
                        <a href="{{route('products.myfavorites')}}" class="button button1">Go to Favorites</a>

                    @else
                        <a href="{{ route('products.addFavorite', ['id_number'=>$item->id]) }}" class="button button1">Add to Favourite</a>

                    @endif
                    <a href="/products/buy/{{$item->category_id}}" class="button button1">Back to {{$item->category_id}} page</a>
                    </div> -->
                    
                            <a href="{{ route('products.removeFromFavorite', ['favorite_id'=>$item->id]) }}" class="btn btn-sm btn-danger">Remove From Favorites</a>
                            <a href="{{ route('products.buy') }}" class="btn btn-sm btn-warning">Add More Products to Favorites</a>
                        </div>
                    </div>
</div>
            @endif
        @endforeach
    @endforeach
                
                
            {{$product->links('pagination::bootstrap-4')}}
                <!-- Pager -->
                 <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">More Products &rarr;</a>
                </div>
                <h1>Nothing is here for now!</h1>
@endsection
<!-- <div class="wrapper create-product">
        <div class="content">
                <div class="title m-b-md">
                    Favorites of You 
                    
                </div>
                <a href=""></a>
             @foreach($product as $item)
                @foreach($favorite as $n)   
                    @if($item->id==$n)
                        <div class="wrapper product-details">
                        <h1>{{ $item->product_name }}</h1>
                        <h3>by {{ $item->user_name}}</h3>
                        <img src="{{URL::to($item->image)}}" style="height: 400px, width: 70px;">
                        <p class="description">{{$item->description}}</p>
                        <p class="price">Price : {{$item->price}}</p>
                        <p class="contact">Contact Number : {{$item->contact_number}}</p>
                        <a href="{{ route('products.removeFromFavorite', ['favorite_id'=>$item->id]) }}" class="btn btn-sm btn-danger">Remove From Favorites</a>
                        <a href="{{ route('products.showSingleProduct', ['id_number'=>$item->id]) }}" class="btn btn-sm btn-success">View Details</a>
                    @endif
                @endforeach
            @endforeach
            {{$product->links('pagination::bootstrap-4')}}-->
                <!-- Pager -->
                <!-- <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">More Products &rarr;</a>
                </div>
                <h1>Nothing is here for now!</h1>
                </div>
            </div>
        </div> --> 