<td style="border: 1px solid black;">
    <p><b>{{__('shop.product_name')}}</b>: {{$product->name}}</p>
    <p><b>{{__('shop.product_price')}}</b>: {{$product->price}}</p>
    <form action="{{route('shop.store')}}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <p><b>{{__('shop.product_count')}}</b>: <input name="product_count" type="number" value="0"></p>
        <p><input type="submit" value="{{__('shop.product_add')}}"></p>
    </form>
</td>
