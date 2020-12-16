@extends('layouts.app')
@section('title', 'Detail Product')
@section('content')
<div class="d-flex justify-content-center" style="margin-top:50px;">
        <div style="width: 20rem">
        &nbsp;&nbsp;
        <img src="\{{$product->product_photo}}" style="height: 23rem" alt="cover">
    </div>
    <div class="alert-secondary" style="width: 30rem; margin-left:80px; padding:40px;">
            <h3><b>{{$product->product_name}}</b></h3>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <h5 class="card-text">Price: <b class="text-danger">IDR. {{$product->product_price}}</b></h5>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <h5>Description: {{$product->product_description}}</h5>
            <br>
            <a href="/add-to-cart-page/{{$product->id}}" class="btn btn-success btn-sm">Add To Cart</a>
            </div>
</div>
@endsection