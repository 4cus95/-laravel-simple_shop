<tr style="border: 1px solid">
    <td><b>{{__('shop.product_name')}}</b></td>
    <td>{{$product->name}}</td>

    <td><b>{{__('shop.product_price')}}</b></td>
    <td>{{$product->price}}</td>

    <td><b>{{__('shop.product_count')}}</b></td>
    <td>{{$product->pivot->count}}</td>
</tr>
