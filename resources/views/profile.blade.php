<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
</head>
<body>
        <style>
            body{
                background-color: black;
                color: white;
                padding: 0;
                margin: 0;
            }
            .favorite img{
                height:250px;
                width: 250px;
                
            }
            .favorite .tuning{
                border:1px solid white;
                width: 400px;
            }
            .profile{
                display: flex;
                justify-content: space-around;
                
            }
            header ul{
                display: flex;
                justify-content: space-around;
                list-style: none;
            }
            .navigation{
                border: 3px solid #ffffff;
                border-radius: 15px;
                width: 400px;
                height: 100%;
                text-align: center;

                
                


            }
            ul{
                margin:0;
                padding: 0;
            }
            .navigation li {
                list-style: none;
                color: white;
                margin: 60px;
                
            }
            a{
                color: white;
                text-decoration: none;
            }

           .navigation img{

                border-radius: 50px;
                width:100px;
                height: 100px;
            }
            footer{
        margin-top:30px;
        border-top: 3px solid white;
    }
    footer ul{
        display:flex;
        justify-content: center;
        
    }
    footer li{
        
        list-style: none;
        padding:20px;
    }
    footer li a {
        text-decoration:none;
        color:white;
    }
        </style>
    <header>
        <ul>
            <li><p><a href="#">Наши салоны</a></p> </li>
            <li><img src="{{ asset('storage/logo.svg') }}" alt="Логотип"></li>
            <li><p>Контактный номер: 8 800 808-88-88</p></li>
        </ul>
    </header>
    <section class="profile">
        <div class="navigation">
            <ul>
                <li><img src="https://w7.pngwing.com/pngs/950/767/png-transparent-body-jewellery-line-design-white-user-icon-svg.png">

                <li><p>Привет: {{ Auth::user()->name }}</p></li>
                <li><a href="#">Редактировать профиль</a><br></li>
                <li><a href="/">На главную</a><br></li>
                <li><a href="/tunings">Каталог</a><br></li>
                <li><a href="/cart">Корзина</a><br></li>
                <li><a href="/map">Найти салон</a><br></li>
                <li><form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form></li>
            </ul>
        </div>
        <div class="special">
            <img src="{{ asset('storage/promo.png') }}" alt="Скидка 10%">
            <h3>Избранное</h3>
            <section class="favorite">
                @foreach($favorite as $item)
                    <div class="tuning">
                        <a href="{{ route('tunings.more', ['id' => $item->id]) }}">
                            <img src='{{ $item->image }}' alt="{{ $item->title }}">
                        </a>
                        <div>
                            <p>Название: {{ $item->title }}</p>
                            <p>Тип: {{ $item->type }}</p>
                            <p>Количество: {{ $item->amount }} шт</p>
                            <p>Стоимость: {{ $item->cost }} ₽</p>
                        </div>
                    </div>
                @endforeach
            <a href="/tunings">В каталог</a>
        </div>
    </section>
    <footer>
        <ul>
            <li><a href="/map">Наши салоны</a></li>
            <li><a href="/tunings">Каталог</a></li>
            

    @if(Auth::check())
    @if(Auth::user()->isAdmin())
        <li><a href="{{ route('profile') }}">Профиль</a></li>
        <li><a href="{{ route('admin.dashboard') }}">Админ - панель</a></li>
    @else
        <li><a href="{{ route('profile') }}">Профиль</a></li>
    @endif
    @else
        <li><a id="loginBtn">Вход</a></li>
    @endif
        </ul>
</footer>
</body>
</html>