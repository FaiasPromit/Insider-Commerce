<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
  // public function __construct()
  //   {
  //       // $this->middleware('auth');
  //       $this->middleware('verified');
  //   }
    public function create() {
        $name = Auth::user()->name;
        
        return view('products.sell',['name' => $name]);
      }
    public function store(Request $request) {
    //   $validated = $request->validate([
    //     'image\.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     'description' => 'required|min:100',
    //     'price' => 'required|numeric|max:5',
    //     'contact_number' => 'required|numeric|max:11|min:9',
    //     'product_name' => 'required|max:15'
    // ]);
      
      $email = Auth::user()->email;
      $name = Auth::user()->name;
      $date = date('Y-m-d H:i:s');
     $data=array();
     $data['created_at']=$date;
     $data['user_name']=$name;
     $data['email_address']=$email;
     $data['product_name']=$request->product_name;
     $data['category_id']=$request->category_id;
     $data['description']=$request->description;
     //image
     $image=$request->file('image');
     $image_name=Str::random(5);
     $ext=strtolower($image->getClientOriginalExtension());
     $image_full_name=$image_name.'.'.$ext;
     $upload_path='public/img/';
     $image_url=$upload_path.$image_full_name;
     $success=$image->move($upload_path,$image_full_name);
     $data['image']=$image_url;
     //image
     $data['price']=$request->price;
     $data['contact_number']=$request->contact_number;
     Product::insert($data);
        //---->previous codes
        // $product = new Product();
        // $email = Auth::user()->email;
        // $name = Auth::user()->name;
        // $product->email_address = $email;
        // $product->user_name = $name;
        // $product->product_name = request('product_name');
        // $product->category_id = request('category_id');
        // $image=$request->file('image');
        // $product->image = $image;
        // // if($image){

        // // }else{

        // // }
        // $product->description = request('description');
        // $product->price = request('price');
        // $product->contact_number = request('contact_number');

        
    
        // $product->save();
         //$result=Product::latest()-> pluck('id');
         
        
        //
        
       // return view('/products/trial',['result'=>$result[0]]);
       return view('welcome')->with('mssg', 'Thanks for your order!');
    
      }
      public function cat(){
        
        
        $product = Product::latest()->paginate(12);
        return view('/products/buy', ['product'=>$product,'cat'=>0]);
    }

    public function show($cat){
        
        
        $product = Product::where('category_id',$cat)->latest()->paginate(12);
        return view('/products/buy', ['cat'=>$cat,'product'=> $product]);
        
    }
    public function myadds(){
      $product = new Product();
      $email = Auth::user()->email;
      $name = Auth::user()->name;
      $product = Product::where('email_address',$email)->latest()->paginate(6);
      return view('/products/myadds', ['user_name'=>$name,'product'=> $product]);
    }
    public function edit($id_number) {
      $product = Product::find($id_number); 
      return view ('/products/edit',['product'=>$product,'id_number'=>$id_number]);
    }
    public function update( Request $request,$id_number){
      $email = Auth::user()->email;
      $name = Auth::user()->name;
      $data=array();
      $data['user_name']=$name;
      $data['email_address']=$email;
      $data['product_name']=$request->product_name;
      $data['category_id']=$request->category_id;
      $data['description']=$request->description;
     
     //image
      $image=$request->file('image');
      if ($image){
      $image_name=Str::random(5);
      $ext=strtolower($image->getClientOriginalExtension());
      $image_full_name=$image_name.'.'.$ext;
      $upload_path='public/img/';
      $image=$request->file('image');
      $image_url=$upload_path.$image_full_name;  
      $success=$image->move($upload_path,$image_full_name);
      @unlink($request->old_photo);
      $data['image']=$image_url;
}
else{
  $data['image']=$request->old_photo;}
    //image
     $data['price']=$request->price;
     $data['contact_number']=$request->contact_number;
     Product::where('id',$id_number)->update($data);
    


      // $product = new Product();
      // $email = Auth::user()->email;
      // $name = Auth::user()->name;
      // $product->email_address = $email;
      // $product->user_name = $name;
      // $product->product_name = request('product_name');
      // $product->category_id = request('category_id');
      // // if()
      // $product->image = request('image');
      // $product->description = request('description');
      // $product->price = request('price');
      //$product->contact_number = request('contact_number');
      //$product->save();
      //$delete=DB::table('products')->where('id',$id_number)->delete();
      $product = Product::where('email_address',$email)->latest()->paginate(6);
    
      return view('/products/myadds', ['user_name'=>$name,'product'=> $product]);
    }
    public function destroy($id_number)
    {
      $post=DB::table('products')->where('id',$id_number)->first();
      $image=$post->image;
      $product=new Product();
      $product=Product::findorFail($id_number);
      $product->delete();
      unlink($image);
      // $favorite=new Favorite();
      // $favorite=Product::findorFail($user_id);
      // $favorite->delete();
      // $email = Auth::user()->email;
      // $name = Auth::user()->name;
      // $product = Product::where('email_address',$email)->latest()->paginate(6);
      // return view('/products/myadds', ['user_name'=>$name,'product'=> $product]);
      return redirect('/products/myadds');

    }
    public function showSingleProduct($id_number){
      $favorite=new Favorite();
      $product = Product::findorFail($id_number);
      $id = Auth::id();
      $favorite = Favorite::where('product_id',$id_number)->where('user_id',$id)->first();
      
      
       //return view('/products/trial',['favorite'=>$confirm]);}
       return view('/products/showSingleProduct',['item'=>$product,'favorite'=>$favorite]);
      
       
       
    }
    
    //  public function addFavorite(Request $request){
    //    $id = Auth::id();

    //    $favorite=new Favorite();
    //    $favorite->product_id=$request->product_id;
    //    $favorite->user_id=$id;
    //    $favorite->save();
    //     DB::table('favorites')->insert([
    //       'user_id' => $id,
    //       'product_id' => $request->input('product_id'),
    //       ]);

    //       return response()->json(
    //         [
    //             'success' => true,
    //             'message' => 'Data inserted successfully'
    //         ]
    //     );
    //     //return view('/products/trial',['favorite'=>$id]);

    // }
    public function addFavorite($id_number){
      $favorite=new Favorite();
      $favorite->product_id=$id_number;
      $favorite->user_id=Auth::id();
      $favorite->save();
      $product = Product::findorFail($id_number);
      return back();
    }
    public function myfavorites()
    {
      $id = Auth::id();
      $favoriteProductId=DB::table('favorites')
      ->where('user_id', '=', $id)
      ->pluck('product_id');
      $product = Product::latest()->paginate(12);
      return view('/products/trial',['favorite'=>$favoriteProductId,'product'=>$product]);
    }
    public function removeFromFavorite($favorite_id)
    {
      $id = Auth::id();
      $favorite=new Favorite();
      $favorite=Favorite::where('product_id',$favorite_id)->where('user_id',$id)->first();
      $favorite->delete();
      // $product = Product::latest()->paginate(6);
      // $favoriteProductId=DB::table('favorites')
      // ->where('user_id', '=', $id)
      // ->pluck('product_id');
      // // return view('/products/trial',['favorite'=>$favoriteProductId,'product'=>$product]);
      // $parameters = ['favorite'=>$favoriteProductId,'product'=>$product];
      return redirect('/products/myfavorites');
      //  return redirect('/products/trial')->with('favorite',$favoriteProductId,'product',$product);
    }
    public function deleteAccount()
    {
        $id = Auth::id();
        $email = Auth::user()->email;
        $post=DB::table('products')
        ->where('email_address', '=', $email)
        ->pluck('image');

        // $post=DB::table('products')->where('email_address',$email)->get();
        // $images=($post->image);
        foreach($post as $image){
          $image_path = $image;
          if(File::exists($image_path)) {
            File::delete($image_path);
          }
        }
        $delete=DB::table('favorites')->where('user_id',$id)->delete();
        $delete2=DB::table('products')->where('email_address',$email)->delete();
        $delete3=DB::table('users')->where('email',$email)->delete();
        
        return redirect('/');
    }
}
