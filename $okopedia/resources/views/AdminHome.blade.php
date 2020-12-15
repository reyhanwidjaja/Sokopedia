@extends('layouts.app')
@section('title', 'Admin Home')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    This is Admin Dashboard. You must be privileged to be here !
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row">
        Hello Admin!
    </div>
</div>
<div class="d-flex justify-content-center" style="margin-top:50px;">
            @foreach($product as $products)
            <div class="card" style="width: 18rem; margin-left:30px; margin-right:30px;">
                <img class="card-img-top" src="{{$products->product_photo}}" alt="Card image cap">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-primary">{{$products->product_name}}</h3>
                    <div class="mt-auto">
                        <p class="card-text">IDR.{{$products->product_price}}</p>
                        <a href="/detailPage/{{$products->id}}" class="btn btn-success">Product Detail</a>
                    </div> 
                </div>
             </div>
             @endforeach       
</div> -->
<!-- <br>
<div class="d-flex justify-content-center">
    {{$product->links()}}
</div> -->
@endsection