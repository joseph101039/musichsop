<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Album;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Cart::select('album_id', 'number')->where('user_id', auth()->id())->orderBy('created_at', 'asc')->get();
        
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
        }

        return view('cart', compact('cartList'));
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
    public function store()
    {
        //

        if(isset($_GET['id']))
        {
            $attributes = request()->validate([
                'id' => ['required', 'Integer','min:1']
            ]);
            
            Cart::firstOrCreate(
                ['user_id' => auth()->id(), 'album_id' => $_GET['id']], 
                ['number' => '1']
            );
        }

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
        return view('cart');
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
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
