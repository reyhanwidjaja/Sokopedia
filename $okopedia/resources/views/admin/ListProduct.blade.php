@extends('layouts.admin')
@section('title', 'Admin Home')
@section('content')

<div class="container">
    <h2 style="margin-bottom:20px">Products</h2>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:1%">Product Id</th>
                    <th style="width:2%">Product Image</th>
                    <th style="width:8%">Product Name</th>
                    <th style="width:5%">Product price</th>
                    <th style="width:8%">Product Description</th>
                    <th style="width:1%"></th>
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
                        <td>
                            <form action="{{ route('deleteProduct') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$prod->id}}">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </div> 
    </div>
</div>
<div class="row justify-content-center">
            {{$products->links()}}
</div>
@endsection