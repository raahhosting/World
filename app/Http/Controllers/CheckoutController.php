<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $tax = config('cart.tax')/100;
      // $discount = session()->get('coupon')['discount'] ?? 0;
      // $newTotal = (Cart::total() - $discount);
        return view('software.checkout')->with([
          'discount'=>$this->getNumbers()->get('discount'),
          'newTotal'=>$this->getNumbers()->get('newTotal'),

        ]);
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

      $contents = Cart::content()->map(function ($item){

        return $item->model->slug.', '.$item->qty;
      })->values()->toJson();
// dd($request->all());
      try {

        $charge = Stripe::charges()->create([

     'amount'=>$this->getNumbers()->get('newTotal'),
     'currency'=>'USD',
     'source'=>$request->stripeToken,
     'description'=>'Order',
     'receipt_email'=>$request->email,
     'metadata'=>[
       'contents'=>$contents,
       'quantity'=>Cart::instance('default')->count(),
     ],

        ]);
Cart::instance('default')->destroy();
return back()->with('success_message','Thank you! Your payment has been successful');
        // echo $charge['id'];

     // Cart::instance('default')->destroy();
     // Session::flash ( 'success-message', 'Payment done successfully !' );



   } catch (CardErrorException $e) {
      return back()->withErrors('Error!' .$e->getMessage());
      }

      // return back()->with('success_message','Thank you! Your payment has been successful');
 // return Redirect::back ();
      // dd($request->all());
    }

    private function getNumbers(){

      $tax = config('cart.tax')/100;
      $discount = session()->get('coupon')['discount'] ?? 0;
      $newTotal = (Cart::total() - $discount);


      return collect([
    'tax'=>$tax,
    'discount'=>$discount,
    'newTotal'=>$newTotal,


      ]);
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
