@extends('layouts.app')
@section('title', 'History')
@section('content')

<div class="container">
    <div class="row justify-content-center" style="margin-bottom:50px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('Transaction History') }}</div>
                <div class="card-body">
                    <table class="table table-hover table-condensed table-borderless">
                        <tbody>
                            @foreach($transactions as $trans)
                                <tr>
                                    <td style="text-align:center;"><a class="text-dark" href="/detail-transaction/{{ $trans->id }}">{{$trans->created_at}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{$transactions->links()}}
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection