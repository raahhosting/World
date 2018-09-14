<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Order;
use App\OrderDownload;


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
        return view('software.checkout2')->with([
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

        $order= $this->addToOrdersTables($request,null);
        Mail::send(new OrderPlaced($order));


Cart::instance('default')->destroy();
session()->forget('coupon');
return back()->with('success_message','Thank you! Your payment has been successful');
        // echo $charge['id'];

     // Cart::instance('default')->destroy();
     // Session::flash ( 'success-message', 'Payment done successfully !' );



   } catch (CardErrorException $e) {
     $this->addToOrdersTables($request,$e->getMessage());
      return back()->withErrors('Error!' .$e->getMessage());
      }

      // return back()->with('success_message','Thank you! Your payment has been successful');
 // return Redirect::back ();
      // dd($request->all());
    }


    protected function addToOrdersTables($request, $error){


      //insert into orders mysql_list_tables
      $order = Order::create([
        'user_id'=>auth()->user() ? auth()->user()->id : null,
        'billing_email'=> $request->email,
        'billing_name' => $request->name,
        'billing_address'=> $request->address,
        'billing_city'  => $request->city,
        'billing_country' =>$request->country,
        //'billing_zip' => $request->zip-code,
        'billing_phone' =>$request->tel,
        'billing_name_on_card' =>$request->name_on_card,
        'billing_discount'=>$this->getNumbers()->get('discount'),
        'billing_discont_code'=>$this->getNumbers()->get('code'),
        'billing_subtotal'=>$this->getNumbers()->get('newSubTotal'),
        'billing_tax'=>$this->getNumbers()->get('newTax'),
        'billing_total' =>$this->getNumbers()->get('newTotal'),
        'error'=>$error,
      ]);

      foreach (Cart::content() as $item) {
        OrderDownload::create([
          'order_id'=>$order->id,
          'download_id'=>$item->model->id,
          'quantity'=>$item->qty,
        ]);
      }
      return $order;
    }

    private function getNumbers(){
      $code = session()->get('coupon')['name'] ?? null;
      $tax = config('cart.tax')/100;
        $discount = session()->get('coupon')['discount'] ?? 0;
      $newSubtotal = (Cart::subtotal() - $discount);
      $newTax = $newSubtotal * $tax;

      $newTotal = (Cart::total()- $discount);


      return collect([
    'tax'=>$tax,
    'discount'=>$discount,
    'newSubTotal'=>$newSubtotal,
    'code'=>$code,
    'newTax'=>$newTax,
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
