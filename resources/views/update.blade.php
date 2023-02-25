@extends('layouts.index')

@section('content')
    <form method="post" enctype="multipart/form-data" class="post" action="{{route('product.updatePost', $product)}}">
        <h1>Edit Product</h1>
        @csrf
        <input type="text" name="name" value="{{ $product->name }}" placeholder="Наименование"><br>
        <textarea name="description" placeholder="Описание">{{ $product->description }}</textarea><br>
        <input type="number" value="{{ $product->price }}" name="price" placeholder="1 299"><br>
        <input type="file" name="image_path"><br><br>

        <br/>

        <button type="submit" class="button_style">Изменить</button>
    </form>
@endsection
