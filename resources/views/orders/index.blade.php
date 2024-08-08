@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @foreach($orders as $order)
                    <table style="border-style: solid; margin-bottom:20px;">
                        <tbody>
                            <tr>
                                <td colspan="3">{{$order->id}}</td>
                                <td colspan="3">{{$order->created_at}}</td>
                            </tr>

                            @foreach($order->items as $item)
                                @include('orders.item', compact('item'))
                            @endforeach

                            <tr>
                                <td colspan="2">{{__('basket.total')}}</td>
                                <td colspan="2">{{$order->total_sum}}</td>
                                <td colspan="2">
                                    <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Удалить">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach

                <table>
                    <tr>
                        <td><b>{{__('orders.total')}}</b></td>
                        <td>{{$totalSum}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
