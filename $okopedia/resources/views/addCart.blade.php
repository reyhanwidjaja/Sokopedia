@extends('layouts.app')
@section('title', 'Add Cart')
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
            <form method="POST" action="/cart/{{$product->id}}">
                {{ csrf_field() }}
                <div class="form-group row">
                        <label for="qty" class="col-md-auto col-form-label " style="width:4rem;">Quantity:&nbsp;</label>

                        <div class="col-md-6">
                        <input id="qty" type="number" class="form-control @error('qty') is-invalid @enderror " style="width:4rem;"name="qty">

                        @error('qty')
                                <span class="invalid-feedback" role="alert">
                                <strong>Must be more than 0</strong>
                                </span>
                        @enderror
                        </div>
                </div>
                <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                        <button type="submit" class="btn btn-success">
                                Add to Cart
                        </button>
                        </div>
                </div>
            </form>
            </div>
</div>
@endsection

