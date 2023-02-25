@extends('layouts.index')

@section('page_title', 'Home Page')

@section('content')
    <main>
        <section class="slider">
            <div class="slider_container container">
                <div class="slider_wrapper">
                    <div class="slide">
                        <div class="slide_text-content">
                            <h1>Можно это не заполнять?</h1>
                            <p>Описание не очень длинное, но крутое,
                                как говорится, размер не важен, главное как написано</p>
                            <button class="button_style">Кнопка действия</button>
                        </div>
                        <span class="darken_layer"></span>
                        <img src="{{asset('public/assets/images/slider-bg.jpg')}}" alt="" class="slide_img">
                    </div>
                    <div class="slide">
                        <div class="slide_text-content">
                            <h1>Заголовок, на деле тоже не крут</h1>
                            <p>Описание не очень длинное, но крутое,
                                как говорится, размер не важен, главное как написано</p>
                            <button class="button_style">Кнопка действия</button>
                        </div>
                        <span class="darken_layer"></span>
                        <img src="{{asset('public/assets/images/slider-bg-2.jpg')}}" alt="" class="slide_img">
                    </div>
                    <div class="slide">
                        <div class="slide_text-content">
                            <h1>Заголовок, на деле тоже не крут 2</h1>
                            <p>Описание не очень длинное, но крутое,
                                как говорится, размер не важен, главное как написано</p>
                            <button class="button_style">Кнопка действия</button>
                        </div>
                        <span class="darken_layer"></span>
                        <img src="{{asset('public/assets/images/VS-Semi-Final_2.png')}}" alt="" class="slide_img">
                    </div>
                    <div class="slide">
                        <div class="slide_text-content">
                            <h1>Заголовок, на деле тоже не крут 3</h1>
                            <p>Описание не очень длинное, но крутое,
                                как говорится, размер не важен, главное как написано</p>
                            <button class="button_style">Кнопка действия</button>
                        </div>
                        <span class="darken_layer"></span>
                        <img src="{{asset('public/assets/images/MatchDay_Semi-Final.png')}}" alt="" class="slide_img">
                    </div>
                </div>
                <div class="dots">
{{--                    <span class="dot active"></span>--}}

                </div>
            </div>
        </section>

        <section id="catalog" class="catalog">
            <div class="catalog_container container">
                <div class="catalog_header">
                    <h1>Каталог</h1>
                    <form action="{{route('search')}}" class="search-box input_style">
                        <div class="search_image_box image_box">
                            <img src="{{asset('public/assets/svg/search-icon.svg')}}" alt="" class="search-icon">
                        </div>
                        <input type="text" name="search" id="" placeholder="Поиск..." class="input_style">
                    </form>
                </div>
                <div class="catalog_content">
                    @foreach($products as $product)
                        <div class="product">
                            <a href="{{route('single', $product->id)}}" class="product_image_box image_box">
                                <img src="{{ 'public' . Storage::url($product['image_path']) }}" alt="" class="product_img">
                            </a>
                            <div class="product_title">
                                {{$product->name}}
                            </div>
                            <div class="product_description">
                                {{substr($product->description, 0, 100)}}...
                            </div>
                            <div class="product_actions">
                                <div class="product_price">
                                    {{number_format($product->price, '0', ',', ' ')}} Руб.
                                </div>
                                <a href="#" type="submit" class="product_order button_style">
                                    Заказать
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </section>
    </main>


@endsection
