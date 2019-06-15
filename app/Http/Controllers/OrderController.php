<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CartController;
use App\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_instance = new CartController();
        if(auth()->check())
        {
            $cartList = $_instance->getCartList();
            if(count($cartList) == 1){  //empty cart
                return redirect('/home');
            }


            return view('checkout.orderInfo', compact('cartList'));
        }
        else    //guest
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
    public function store(Request $request)
    {
        //
        $attributes = request()->validate(
            [
                'name' => ['required', 'bail', 'min:3', 'max:20'],
                'cell-tel' => ['required', 'regex:/09[0-9]{2}\-[0-9]{6}/'],
                'credit-no' => ['required', 'regex:/[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}/'],
                'expiry' => ['required', 'regex:~(0[1-9]|1[1-2]){1}/[0-9]{2}~'],
                'cvc' => ['required', 'digits:3', 'integer'],
                'county' => ['required', 'integer', 'between:1,1'],
                'city' =>   ['required', 'integer', 'between:1,12'],
                'address'=> ['required', 'min:3', 'max:50'],                 
            ]
        );

        /* todo: store into database as a unfinished status*/
        $eztrans = $attributes + ['user_id'=> auth()->id() ];

        return view('checkout.ezpayTransaction', compact('eztrans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
