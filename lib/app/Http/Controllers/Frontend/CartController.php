<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Hosting;
use Cart;
class CartController extends Controller
{
    public function getAddCart($id){
    	$price = Price::find($id);
    	switch ($price->cate_id) {
    		case 1:
    			$product = Hosting::find($price->product_id);
    			break;
    		case 2:
    			$product = Email::find($price->product_id);
    			break;
    		case 3:
    			$product = Sever::find($price->product_id);
    			break;
    		case 4:
    			$product = Ads::find($price->product_id);
    			break;
    		case 5:
    			$product = Software::find($price->product_id);
    			break;
    		case 6:
    			$product = Design::find($price->product_id);
    			break;
    		case 7:
    			$product = Bonus::find($price->product_id);
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    	Cart::add(['id'=>$id, 'name'=>$product->name, 'qty'=>1, 'price'=>$price->price, 'options'=>['time'=>$price->time]);

    	return redirect('admin/order');
    }
    public function getShowCart(){
        // dd(Cart::content());
    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart', $data);
    }
    public function getDeleteCart($id){
    	if($id == 'all'){
    		Cart::destroy();
    	}
    	else{
    		Cart::remove($id);
    	}
    	return back();
    }
    public function getUpdateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);

    }
    public function postComplete(Request $request){
    	$data['info'] = $request->all();
    	$email = $request->email;
    	$data['cart'] = Cart::content();
    	$data['total'] = Cart::total();
        // return view('frontend.email', $data);
        // dd($data);
    	Mail::send('frontend.email', $data, function($message) use ($email){
    		$message->from('vquyenaaa@gmail.com', 'VietProShop');
    		$message->to($email, $email)->subject('Welcome!');
    		// $message->cc('thongminh.depzai@gmail.com', 'boss');
    		$message->subject('Xác nhận hóa đơn mua hàng');
    	});
        
    	Cart::destroy();
    	return redirect('complete');
    }
    public function getComplete(){
    	return view('frontend.complete');
    }
}
