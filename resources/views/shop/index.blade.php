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

            <table>
                <tbody>
                @php
                    $count = count($products);
                @endphp

                @for ($i = 0; $i < $count; $i += 3)
                    <tr>
                        @for ($j = 0; $j < 3; $j++)
                            @if (isset($products[$i + $j]))
                                @include('shop.product_card', ['product' => $products[$i + $j]])
                            @else
                                <td></td>
                            @endif
                        @endfor
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
