@extends('layouts.app')
@section('title', 'TransactionDetail')
@section('content')

<div class="container">
    <h2 style="margin-bottom:20px">Detail Transaction</h2>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:2%">Product Image</th>
                    <th style="width:8%">Product Name</th>
                    <th style="width:5%">Quantity</th>
                    <th style="width:5%">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Details as $d)
                    <tr>
                        <td>
                            <div class="col-sm-3 hidden-xs">
                                <img src="\{{ $d->products->first()->product_photo }}" width="100" height="100" class="img-responsive"/>
                            </div>
                        </td>
                        <td>{{$d->products->first()->product_name}}</td>
                        <td>{{$d->quantity}}</td>
                        <td>IDR.{{$d->products->first()->product_price * $d->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </div> 
    </div>
</div>
@endsection