@extends('layouts.app')


@section('content')
        <!-- <div class="wrapper create-product">
            

            <div class="content">
                <div class="title m-b-md">
                    @if($cat==null)
                    {{ "All Categories" }}
                    @else
                    {{$cat}}
                    @endif   
                </div>

                <div class="links m-b-md">
                    
                    <a href="/products/buy/Home Appliances" class="button button1">Home Appliances</a>
                    <a href="/products/buy/Question Banks" class="button button1">Question Banks</a>
                    <a href="/products/buy/Books" class="button button1">Books</a>
                    <a href="/products/buy/Notes" class="button button1">Notes</a>
                    <a href="/products/buy/Lab Equipments" class="button button1">Lab Equipments</a>
                    <a href="/products/buy/Music Instruments" class="button button1">Music Instruments</a>
                    <a href="/products/buy/Sports Instruments" class="button button1">Sports Instruments</a>
                    <a href="/products/buy" class="button button1">All</a>
                </div>
        </div>

        @foreach($product as $item)

        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1"><img  src="{{URL::to($item->image)}}" style="height: 150px; width: 200px; margin=0px auto; border: 1px solid #ddd;
                     border-radius: 4px; padding: 5px; alignment: center;">
                        </div>
                        <div class="col-md-6 mt-1" style="width:100px !important;">
                            <h5><b>{{$item->product_name}}</b></h5>
                            <div >
                                <div class="d-block" style="margin: 2px"><b>Posted by:</b></div>   <div class="ratings mr-2">  {{   $item->user_name}}
                                </div>
                            </div>        
                            <div class="d-block" style="width:100%" >
                                <div style="margin: 2px" ><b>Description:</b></div>   
                                <div> <p class="card-text">{!! \Illuminate\Support\Str::limit($item->description, 100, '...') !!}</p>
                                 </div>
                                    
                            </div>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">{{$item->price}} Taka</h4>
                           </div>
                        ! <h6 class="text-success">Free shipping</h6> -->
                        <!-- <div class="d-flex flex-column mt-4"><button class="button button1" type="button" ><a href="{{ route('products.showSingleProduct', ['id_number'=>$item->id]) }}" class="a-mod">Show Details</a></button>
                            @auth
                            <button class="button" type="button">Contact No : {{$item->contact_number}}</button></div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach  
        {{$product->links('pagination::bootstrap-4')}}  
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">More Products &rarr;</a>
        </div> 
        <h1>Nothing more!</h1>    --> 
                
                
    <!-- </div> -->

    <div class="content">
                <div class="title m-b-md">
                    @if($cat==null)
                    {{ "All Categories" }}
                    @else
                    {{$cat}}
                    @endif   
                </div>

                <div class="links m-b-md">
                    <a href="/products/buy" class="button button1">All</a>
                    <a href="/products/buy/Home Appliances" class="button button1">Home Appliances</a>
                    <a href="/products/buy/Question Banks" class="button button1">Question Banks</a>
                    <a href="/products/buy/Books" class="button button1">Books</a>
                    <a href="/products/buy/Electronics" class="button button1">Electronics</a>
                    <a href="/products/buy/Lab Equipments" class="button button1">Lab Equipments</a>
                    <a href="/products/buy/Music Instruments" class="button button1">Music Instruments</a>
                    <a href="/products/buy/Sports Instruments" class="button button1">Sports Instruments</a>
                    
                </div>
        <div class="box-buy-products">
        @foreach($product as $item)
                
                <div class="wrapper">
                <div class="card-buy-products">
                <img src="{{URL::to($item->image)}}" alt="Avatar" class="img-buy-products">
                
                    <h1 style="color:#333333; text-shadow: 2px 2px sandybrown;">{{ $item->product_name }}</h1>
                    <!-- <h3 style="font-style: italic;">by {{ $item->user_name}}</h3> -->
                    <p class="price">Price : <b>{{$item->price}} </b> taka</p>
                    @auth
                    <p class="contact">Contact Number : {{$item->contact_number}}</p>
                    @endauth
                    <p class="card-text">Desciption: {!! \Illuminate\Support\Str::limit($item->description, 100, '...') !!}</p>
                    <a href="{{ route('products.showSingleProduct', ['id_number'=>$item->id]) }}" class="button button1">View Details</a>
                
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

