@php use App\Models\User;use Illuminate\Support\Facades\Auth; @endphp
<header class="header">
    <div class="header_container container">
        <a href="{{route('home')}}" class="logotype-box">
            <div class="logotype_image_box image_box">
                <img src="{{asset('public/assets/svg/logo-giftale.svg')}}" alt="" class="logotype_img">
            </div>
            <h2 class="logotype_title">Giftale</h2>
        </a>
        <nav class="menu">
            @guest()
{{--                <li><a href="{{route('reg')}}" class="link-style">Зарегистрироваться</a></li>--}}
{{--                <span>/</span>--}}
                <li><a href="{{route('auth')}}" class="link-style">Авторизоваться</a></li>
            @endguest
            @auth()
                <li><a href="{{route('admin')}}" class="link-style">Админ панель</a></li>
                <span>/</span>
                <li><a href="{{route('logout')}}" class="link-style">Выйти</a></li>
            @endauth
        </nav>
    </div>
</header>
