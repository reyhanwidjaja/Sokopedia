@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:30%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:5%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
            @foreach($carts as $c)
                <?php $total += $c->products->first()->product_price * $c->quantity ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $c->products->first()->product_photo }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $c->products->first()->product_name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">IDR.{{ $c->products->first()->product_price }}</td>
                    <td data-th="Quantity">
                        <form action="{{ route('updateCartItem') }}" method="POST">
                            @csrf
                            <input type="number" name="qty" value="{{ $c->quantity }}" class="form-control quantity" />
                            <input type="hidden" name="id" value="{{$c->products->first()->id}}"> <br>
                            <input type="submit" value="update" class="btn btn-primary">
                        </form>
                    </td>
                        <td class="text-center">IDR.{{ $c->products->first()->product_price * $c->quantity }}</td>
                        <td class="actions">
                        <form action="{{ route('deleteCartItem') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$c->products->first()->id}}">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-success"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            @if(!$carts->isEmpty())
                <a href="{{ route('checkout') }}" class="btn btn-danger"><i class="fa fa-angle-left"></i> Checkout</a></td>
            @endif
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total IDR.{{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')


    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>

@endsection