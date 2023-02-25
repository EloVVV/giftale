@extends('layouts.index')

@section('content')
    <div class="single">
        <div class="single_container container">
            <div class="product">
                <a href="{{route('single', $product->id)}}" class="product_image_box image_box">
                    <img src="{{ '../public' . Storage::url($product['image_path']) }}" alt="" class="product_img">
                </a>
                <div class="product_title">
                    {{$product->name}}
                </div>
                <div class="product_description">
                    {{$product->description}}
                </div>
                <div class="product_actions">
                    <div class="product_price">
                        {{number_format($product->price, '0', ',', ' ')}} Руб.
                    </div>
                    <a href="#" class="product_order button_style">
                        Заказать
                    </a>
                </div>
            </div>
            <div class="admin_buttons">
                <a href="{{route('product.update', $product->id)}}" class="button_style">Редактировать</a>
                <a href="{{route('product.delete', $product->id)}}" class="button_style">Удалить</a>
            </div>
        </div>
    </div>
@endsection
