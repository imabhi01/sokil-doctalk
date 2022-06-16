<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Category;
use App\Models\Order;
use Stripe;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('index', compact('products'));
    }

    public function medicine(){
        $products = Product::latest()->get();
        return view('medicine', compact('products'));
    }

    public function productDetail($slug){
        $product = Product::where('slug', $slug)->first();
        $relatedProducts = (count($product->categories) > 0) ? $product->categories[0]->products : null;
        return view('product-detail', compact('product', 'relatedProducts'));
    }

    public function doctors(){
        $product = Product::first();
        return view('doctors', compact('product'));
    }

    public function userSetting(){
        $userProfile = (auth()->user()->userProfile) ? auth()->user()->userProfile : null;
        return view('setting', compact('userProfile'));
    }

    public function userSettingStore(Request $request){

        $request->validate([
            'user_id' => 'required|unique:user_profiles',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'years_practiced' => 'required|string',
            'nmc_number' => 'required|string',
            'speciality' => 'required|string',
            'qualification' => 'required|string',
            'description' => 'required|string',
        ],[
            'user_id.unique' => 'Profile already added!'
        ]);

        $inputs = $request->all();

        $user = User::find($request->user_id);

        if($user->role != 'doctor'){
            abort(403, 'Permission denied for this role of user!');
        }

        if($request->profile_image){
            $fileName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('uploads/doctor-profile'), $fileName);
            $inputs['profile_image'] = $fileName;
        }

        if($request->document){
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('uploads/doctor-document'), $fileName);
            $inputs['document'] = $fileName;
        }

        UserProfile::create($inputs);

        return redirect('user/setting')->with('success', 'Profile stored successfully!');

    }

    public function userSettingUpdate(Request $request, $id){
        
        $userProfile = UserProfile::findOrFail($id);

        $request->validate([
            'user_id' => 'required',
            'profile_image' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'years_practiced' => 'required|string',
            'nmc_number' => 'required|string',
            'speciality' => 'required|string',
            'qualification' => 'required|string',
            'description' => 'required|string',
        ],[
            'user_id.unique' => 'Profile already added!'
        ]);

        $requests = $request->all();

        $user = User::find($request->user_id);

        if($user->role != 'doctor'){
            abort(403, 'Permission denied for this role of user!');
        }

        if($request->profile_image){
            $fileName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('uploads/doctor-profile'), $fileName);
            $requests['profile_image'] = $fileName;
        }else{
            $requests['profile_image'] = $userProfile->profile_image;
        }

        if($request->document){
            $file = time().'.'.$request->document->extension();  
            $request->document->move(public_path('uploads/doctor-document'), $file);
            $requests['document'] = $file;
        }else{
            $requests['document'] = $userProfile->document;
        }

        $userProfile->update($requests);

        return redirect('user/setting')->with('success', 'Profile updated successfully!');

    }

    public function addToCart(Request $request){
        
        $product = Product::find($request->product_id);
        
        $inputs = [];

        if($cart = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->where('status', 1)->first()){
            $inputs = $request->all();
            $inputs['qty'] = ($cart->qty + $request['qty']);
            $cart->update([
                'qty' => $inputs['qty'],
                'sub_total' => $inputs['qty'] * $products->price
            ]);
        }else{
            $inputs = $request->all();
            $inputs['sub_total'] = $request->qty * $product->price;
            Cart::create($inputs);
        }

        return redirect('product/'. $product->slug)->with('success', 'Product added to Cart!');
    }

    public function cartPage(){
        $carts = Cart::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $data = [];
        $total = 0;
        foreach($carts as $cart){
            $product = Product::find($cart->product_id);
            $total = $total + $cart->sub_total;
            $data[] = [
                'id' => $cart->id,
                'product_title' => $product->title,
                'image' => $product->image,
                'price' => $product->price,
                'qty' => $cart->qty,
                'subtotal' => $cart->sub_total
            ];
        }
        
        $data['total'] = $total;

        return view('cart', compact('data'));
    }
   
    public function updateCart(Request $request){

        if(count($request->cart_id) > 0){
            foreach($request->cart_id as $key => $cart){
                $currentCart = Cart::find($cart);
                $product = Product::find($currentCart->product_id);
                $currentCart->update([
                    'qty' => $request->qty[$key],
                    'sub_total' => $request->qty[$key] * $product->price
                ]);
            }
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
    
    public function deleteCartItem(Request $request){

        $cart = Cart::find($request->cartId);

        if(!$cart){
            abort(404, 'Product not found!');
        }
        
        if(auth()->user()->id == $cart->user_id){
            $cart->delete();
        }else{
            abort(403, 'Permission denied User did not match!');
        }

        return response()->json([
            'status' => 200,
            'message' => 'Item deleted Successfully!'
        ]);

    }

    public function checkout(){
        return view('checkout');
    }

    public function placeOrder(Request $request){

        $subtotal = 0;

        $total = 0;

        $secretKey = config('services.stripe.secret');
        
        Stripe\Stripe::setApiKey($secretKey);
        
        $user = User::find($request->user_id);
        
        if($user->id == auth()->user()->id){
            foreach($user->cart as $cart){
                $subtotal += $cart->sub_total;
            }
        }else{
            session()->flash('failure', 'Payment failed due to user mismatch!');
            return back();
        }

        $total = $subtotal + $total;
        
        $payment = Stripe\Charge::create ([
            "amount" => $total,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "This is a test payment from doctalk" 
        ]);

        if($payment->jsonSerialize()['status'] != 'succeeded'){
            session()->flash('failure', 'Payment failed!');
            return back();
        }

        if($payment->jsonSerialize()['status'] == 'succeeded'){

            $order = Order::create([
                'user_id' => $user->id,
                'sub_total' => $subtotal,
                'total' => $total,
                'status' => 1
            ]);

            foreach($user->cart as $cart){
                $cart->update([
                    'status' => 0
                ]);
            }

            session()->flash('success', 'Payment successful!');
            return back();
        }

    }

    public function categoryProducts($slug){
        $category = Category::where('slug', $slug)->first();
        $products = $category->products;
        return view('category-page', compact('products'));
    }

}
