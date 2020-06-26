<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResourse;
use App\product;
use App\order;
use Illuminate\Http\Request;
use DB;
use DateTime;

class ProductController extends Controller
{
    public function index(){
        return ProductResourse::collection(product::paginate());

    }

    public function show($id){
        return new ProductResourse(product::find($id));

    }


    public function addtocart(Request $request){
       $data = $request->all();

       $user_id = $data['user_id'];
       $product_id = $data['product_id'];
    
        
       $product_details = Product::find($product_id);

       $countproducts = DB::table('carts')->where(['product_id' => $product_details->id, 
       'title' => $product_details->title,'description' => $product_details->description,
       'price' => $product_details->price,'quantity' => $product_details->quantity,
       'total' => $product_details->total,'discount' => $product_details->discount,
       'user_id' => $user_id ,'confirmed' => false ])->count();

       if($countproducts > 0){
        $message = [
            'error' => true,
            'message'=> 'error'
        ];
 
        return response($message, 401);
       }
       else{
         DB::table('carts')->insert(['product_id' => $product_details->id, 
        'title' => $product_details->title,'description' => $product_details->description,
        'price' => $product_details->price,'quantity' => $product_details->quantity,
        'total' => $product_details->total,'discount' => $product_details->discount,
        'user_id' => $user_id ,'user_id' => $user_id ,'user_id' => $user_id , ]);
       }


       $getcart = DB::table('carts')->where(['user_id' => $user_id , 'confirmed' => false ])->get();


       return $getcart;

    }


    public function getcart(Request $request){
       
       $data = $request->all();

       $user_id = $data['user_id'];
       $getcart = DB::table('carts')->where(['user_id' => $user_id , 'confirmed' => false ,])->get();

       
       return $getcart;

    }



    public function checkout(Request $request){
       
        $data = $request->all();
 
        $user_id = $data['user_id'];

        $order = new order();

        $order->user_id = $user_id;

        $userOrdersCount = DB::table('orders')->where(['user_id' => $user_id ])->count();
        
        $order->userorder_num = $userOrdersCount + 1 ;

        $now = new DateTime();

        $order->order_date = $now ;

        $order->save();

        $userOrder = DB::table('carts')->where(['user_id' => $user_id , 'confirmed' => false ,])->update(['confirmed'=>true,
        'order_id'=>$order->id,'userorder_num'=>$order->userorder_num]);

        $getConfirmedOrder = DB::table('carts')->where(['user_id' => $user_id , 'order_id'=>$order->id])->get();
        
        return  $getConfirmedOrder;
 
     }


    public function deletecartitem(Request $request){
       
        $data = $request->all();
 
        $item_id = $data['id'];
        $getcart = DB::table('carts')->where(['id' => $item_id , 'confirmed' => false])->delete();
 
        
        return $getcart;
 
     }


     public function deletecart(Request $request){
       
        $data = $request->all();
 
        $user_id = $data['user_id'];
        $getcart = DB::table('carts')->where(['user_id' => $user_id ,'confirmed' => false ])->delete();
 
        
        return $getcart;
 
     }
}
