@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
            @foreach($product as $products)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$products->product_photo}}" alt="Card image cap">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-primary">{{$products->product_name}}</h3>
                    <div class="mt-auto">
                        <p class="card-text">IDR.{{$products->product_price}}</p>
                        <a href="#" class="btn btn-success">Product Detail</a>
                    </div> 
                </div>
             </div>
             @endforeach       
</div>
<br>
<div class="d-flex justify-content-center">
    {{$product->links()}}
</div>
@endsection
