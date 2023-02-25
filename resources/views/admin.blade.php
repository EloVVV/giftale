@extends('layouts.index')

@section('content')
    @auth()
        <section class="admin-panel">
            <div class="admin-panel_container container">
                <h1>Админ панель</h1>
                <div class="panel_content">
                    <div class="panel_actions">
                        <a href="{{route('product.create')}}" class="button_style">Создать товар</a>
                    </div>
                </div>
            </div>
        </section>
    @endauth
@endsection
