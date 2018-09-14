@extends('layout.app')

@component('mail::message')

<h1>This is the email that is being sent out.</h1>


Order ID:{{$order->id}}<br>
Order Email: {{$order->billing_email}}<br>Order Billing Name:{{$order->billing_name}}<br>
Order Total: ${{round($order->billing_total,2)}}

**Items Ordered**

@foreach ($order->downloads as $download)

Name: {{$download->title}}<br>
Price: ${{round($download->price,2)}}<br>
Quatity: {{$download->pivot->quantity}}<br>

Download Link: <a href="{{$download->file}}">Download{{$download->title}}</a><br>
@endforeach

You can further get further details about your order by logging into our website.

@component('mail::button',['url'=>config('app.url'),'color'=>'red'])
Go to Website

@endcomponent


Thank you again for downloading the software

Regards,<br>
{{config('app.name')}}
