@extends('layouts.index')

@section('content')
    <form method="post" enctype="multipart/form-data" class="post" action="{{route('product.createPost')}}">
        <h1>Add Product</h1>
        @csrf
        <input type="text" name="name" placeholder="Наименование"><br>
        <textarea name="description" placeholder="Описание"></textarea><br>
        <input type="number" name="price" placeholder="1 299"><br>
        <input type="file" name="image_path"><br><br>

        <br/>

        <button type="submit" class="button_style">Добавить</button>
    </form>
@endsection
