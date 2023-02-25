@extends('layouts.index')

@section('page_title', 'Home Page')

@section('content')
    @guest()
        <div class="form_container container">
            <h1>Регистрация</h1>
            <form
                action="{{route('regPost')}}"
                method="post"
                enctype="multipart/form-data"
            >
                <div class="inputs_content">
                    @csrf
                    <div class="input_box">
                        <p class="input_title">Логин:</p>
                        <input type="text" name="name" id="" placeholder="Username404" class="input_style">
                    </div>
                    <div class="input_box">
                        <p class="input_title">Пароль:</p>
                        <input type="password" name="password" id="" placeholder="123456" class="input_style">
                    </div>
                    @error('password') {{ $message }} @enderror
                    <div class="input_box">
                        <p class="input_title">Повторите пароль:</p>
                        <input type="password" name="re_password" id="" placeholder="123456" class="input_style">
                    </div>
                </div>
                <button type="submit" name="reg" class="button_style">Зарегистрироваться</button>
            </form>
        </div>
    @endguest

    @auth()
        <h1>Вы уже авторизованы</h1>
    @endauth
@endsection
