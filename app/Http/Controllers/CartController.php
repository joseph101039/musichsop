<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'index']]);  // require login in before access all project methods
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->check())
        {        
            $items = Cart::select('album_id', 'number')->where('user_id', auth()->id())->orderBy('created_at', 'asc')->get();
            $price_sum = 0;

            if(count($items) > 0){
                $number = array();
                $album_id = array();
                // Gets a list of all the 2nd-level keys in the array
                foreach($items as $item){
                    $album_id[] = $item['album_id'];
                    $number[] = $item['number'];   
                }

                $albumidStr = implode(',', $album_id);

                $cartList = Album::select('id', 'coverimg_file', 'album_name', 'singer', 'release', 'price')->
                whereIn('id', $album_id)->
                orderByRaw(\DB::raw("FIELD(id, $albumidStr)"))->get();

                $count = count($cartList);
                for($i = 0; $i < $count; $i++){
                    $cartList[$i]['number'] = $number[$i];
                    $price_sum +=  (float)$cartList[$i]['price'] * (float)$cartList[$i]['number'];
                }
            }
            else{
                $cartList = array();
                
            }
            $cartList['price_sum'] = $price_sum;
            return view('cart', compact('cartList'));
        }
        else//guest
        {
            return redirect('/login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($album_id)
    {
  
        //
        if(auth()->check()) // logged user
        {
            $request = new Request([
                'id' => $album_id,
            ]);
            $request->validate([
                'id' => ['required', 'Integer','min:1']
            ]);
            
            Cart::firstOrCreate(
                ['user_id' => auth()->id(), 'album_id' => $album_id], 
                ['number' => '1']
            );

            
        }
        
        // for both logged user and guest
        if(session()->has('cart'))
        {
            $items = session()->get('cart');
            if(!in_array($album_id, $items)){
                session()->push('cart', $album_id);
            }
        }
        else{
            session()->push('cart', $album_id);
        }
        
        return strval(count(session()->get('cart')));
        

    }

    /* 
    * Add all the cart items in SESSION['cart'] into database
    */
    public static function loginAddCartSession()
    {
        if(session()->has('cart'))
        {
            $_instance = new CartController();
            $items = session()->get('cart');
            foreach($items as $item){
                $_instance->store(strval($item));
            }

            $carts = auth()->user()->carts();
            foreach($carts as $cart){
                if(!in_array($cart['album_id'], $items)){
                    session()->push('cart', $cart['album_id']);
                }
            }
        }
        return true;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update($album_id, $number)
    {
        //
        
        if($number < 100 && $number > 1 && Auth::check()){
            Cart::where('user_id', auth()->id())->where('album_id', $album_id)->update(['number' => $number]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($album_id)
    {
        //
        if(Cart::where('user_id', auth()->id())->where('album_id', $album_id)->delete()){
            if(session()->has('cart'))
            {
                $items = session()->get('cart');

                //remove the album id from session
                if(($key = array_search( $album_id, $items)) !== false)
                {
                    unset($items[$key]);
                    session(['cart' => $items]);
                }
            }
            return strval(count(session()->get('cart')));
        }
        else{
            return 'false';
        }
    }
        

    

    public function checkout()
    {
        if(Cart::where('user_id', auth()->id())->delete()){
            if(session()->has('cart'))
            {
                session(['cart' => []]);
            }
            return 'true';
        }
        else{
            return 'false';
        }
    }
}
