<?php
namespace App\Http\Controllers;
use App\EZPay\Collections\EzPayPostCollection;
use Illuminate\Http\Request;


class EzPayController extends Controller
{

    protected $postCollection;

    public function __construct(EzPayPostCollection $postCollection)
    {
        $this->postCollection = $postCollection;
    }
    

    public function notifyUrl(Request $request)
    {
        /* $this->EzPayPostCollection->collectResponse($request);
        return $this->postCollection; */
        return $request;    //for testing purpose
    }

    public function returnUrl(Request $request)
    {
        dd($request);
    }

    public function customUrl(Request $request)
    {
        dd($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
