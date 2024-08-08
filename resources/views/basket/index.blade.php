@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($products->isEmpty())
                    Корзина пуста
                @else
                    <table style="border-style: solid;">
                        <tbody>
                        @foreach($products as $product)
                            @include('basket.product', compact('product'))
                        @endforeach

                        <tr>
                            <td colspan="3">{{__('basket.total')}}</td>
                            <td colspan="3">{{$cart->total_sum}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <form action="{{route('orders.store')}}" method="post">
                        @csrf
                        <input type="submit" value="Создать заказ">
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
