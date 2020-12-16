@extends('layouts.admin')
@section('title', 'Admin Home')
@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-bottom:50px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>
                <div class="card-body">
                    <table class="table table-hover table-condensed table-borderless">
                        <tbody>
                            @foreach($categories as $cat)
                                <tr>
                                    <td style="text-align:center;"><a class="text-dark" href="/product-by-category/{{ $cat->id }}">{{$cat->category_name}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @if(is_array($products) || is_object($products))
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:1%">Product Id</th>
                    <th style="width:2%">Product Image</th>
                    <th style="width:8%">Product Name</th>
                    <th style="width:5%">Product price</th>
                    <th style="width:8%">Product Description</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>
                                <div class="col-sm-3 hidden-xs">
                                    <img src="\{{ $prod->product_photo }}" width="100" height="100" class="img-responsive"/>
                                </div>
                            </td>
                            <td>{{$prod->product_name}}</td>
                            <td>{{$prod->product_price}}</td>
                            <td>{{$prod->product_description}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </div>  
        </div>
    @endif
</div>
@endsection