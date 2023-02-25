@extends('layouts.index')

@section('page_title', 'Home Page')

@section('content')
    @guest()
        <div class="form_container container">
            <h1>Авторизация</h1>
            @if($errors->any())
                <li class="errors">
                    @foreach($errors->all() as $error)
                        <p>
                            {{ $error }}
                        </p>
                    @endforeach
                </li>
            @endif
            <form
                action="{{route('authPost')}}"
                method="post"
                enctype="multipart/form-data"
            >
                <div class="inputs_content">
                    @csrf
                    <div class="input_box">
                        <p class="input_title">Логин:</p>
                        <input value="{{ old('name') }}"type="text" name="name" id="" placeholder="Username404" class="input_style">
                    </div>
                    <div class="input_box">
                        <p class="input_title">Пароль:</p>
                        <input type="password" name="password" id="" placeholder="123456" class="input_style">
                    </div>
                </div>
                <button type="submit" name="auth" class="button_style">Войти</button>
            </form>
        </div>
    @endguest

@endsection
