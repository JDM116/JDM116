<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/resources/css/styles.css">
    <title>JDM116</title>
    <style>
        body, html {
            background-color: black;
            margin: auto;
            padding: auto;
            text-align: center;
            color: white;

        }
        header{
             height:0px;
             
        }
        header ul{
            display: flex;
            justify-content: space-around;
            flex-wrap:wrap;


        }
        header li {
            list-style-type: none;
            margin-top:30px;
            
        }
        header img {
            width: 250px;
            height: 100px;

        }

        header {
            color: white; /* Цвет текста можно настроить по желанию */

        }
       header li a, main a {

            border: rgb(255, 255, 255) 1px solid;
            padding: 10px;
            text-decoration: none;
            color: white;
            font-size: 24px;


        }
       header li a:hover, main a:hover{
        text-shadow:
        -1px -1px 0 #000,
         1px -1px 0 #000,
        -1px  1px 0 #000,
         1px  1px 0 #000; /* Цвет обводки */
        background-color: white;

        }
        main{
            background-image: url('{{ asset('storage/main.jpg') }}');
            width: 100%;
            height: 500px;
            padding-top: 500px;
        }
        main img{
            width: 100%;
            height: 1080px;
            object-fit: cover;
        }

        .about{
            margin-top: 40px;
            display: flex;
            justify-content: center;
            font-size: 30px;
            flex-wrap:wrap;


        }
        .about img{
            margin-top: 70px;
        }
        .txt{
            margin: 40px;
            width: 400px;
            text-align: right;
            color: white;

        }

        .whells {
            display: flex;
            justify-content: space-around; /* Выводим второй слой по горизонтали */
            flex-wrap: wrap; /* Выводим второй слой по вертикали */
            flex-direction:row; /* Выводим второй слой по вертикали */
            align-items: center; /* Центрируем содержимое по горизонтали */
            margin: auto;
            max-width: 1600px; /* Ограничиваем ширину контейнера */
        }

        .wheel {
            display: flex; /* Делаем каждый элемент wheel flex-контейнером */
            align-items: center; /* Выравнивание по центру */
            margin: 20px 0; /* Отступы между элементами */
            border: white 1px solid; /* Рисуем границу вокруг всего контейнера */
            width: 600px;
            height: 200px;
            padding: 30px;
        }

        .wheel img {
            max-width: 220px; /* Ограничиваем ширину изображения */
            margin-right: 20px; /* Отступ справа от изображения */
        }

        .wheel h2,
        .wheel p {
            margin: 0; /* Убираем отступы по умолчанию */
            text-align: left;
            font-size: 30px;
            padding: 15px;
        }
        .modal {

            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            color: white;
            background-color:black;
            opacity: 0.7;
            margin: 15% auto;
            padding: 20px;
            width: 300px;
            color: black;
        }
        .modal-content img {
            max-width: 100%;
            height: auto;

        }
        .modal-content form, h1, h2, h3, h4{
            color:white;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        button{
            width: 100px;
            height:20px;
        }
        .slider-container {
        position: relative;
        max-width: 800px;
        margin: auto;
        overflow: hidden;
        margin-top:50px;
    }

    .slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slide {
        min-width: 100%;
    }

    .slide img {
        width: 100%;
        height: auto;
    }

    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        background-color: rgba(0,0,0,0.8);
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }
    .prev {
        left: 0;
        border-radius: 3px 3px 0 0;
    }

    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.9);
    }
    footer{
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
    .cart{
        width: 50px;
        height: 50px;
    }
    #disclaimerModal {
        display: block;
        
    }

    #disclaimerModal .modal-content {
        background-color: #f1f1f1;
        color: black;
        font-size:40px;
        width: 500px;
    }

    #disclaimerModal h2 {
        color: black;
    }
    </style>
</head>
<body>
    <header>
        <ul>
            <li><img src="{{ asset('storage/logo.svg') }}" alt="Логотип"></li>
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
        <li><p>Контактный номер: 8 800 808-88-88</p></li>
        
        </ul>
        
    </header>

    <div id="disclaimerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Уведомление</h2>
        <p>Этот сайт создан исключительно в учебных целях.</p>
    </div>
    </div>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src = "{{ asset('storage/logo.svg') }}" alt="logo">
            <h2>Регистрация</h2>
            <form action ="/register" method="POST">
                <form action="/register" method="POST">
                    @csrf
                    <label for="name">Имя пользователя:</label><br>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="email"><br><br>
                    <label for="password">Пароль:</label><br>
                    <input type="password" id="password" name="password"><br><br>
                    <label for="password_confirmation">Подтверждение пароля:</label><br>
                    <input type="password" id="password_confirmation" name="password_confirmation"><br><br>
                    <input type="submit" value="Зарегистрироваться">
                </form>
        </div>
    </div>
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="{{ asset('storage/logo.svg') }}" alt="logo">
            <h2>Авторизация</h2>
            <form action="/login" method="POST">
                @csrf
            <label for="auth_email">E-mail:</label><br>
            <input type="email" id="auth_email" name="email" required><br><br>
            <label for="auth_password">Пароль:</label><br>
            <input type="password" id="auth_password" name="password" required><br><br>
            <input type="submit" value="Войти">
        </form>
        <button id="regBtn">Регистрация</button>
            <p id="authError" style="color: red; display: none;"></p>
        </div>
    </div>
    <main>
        <a href="/tunings">Смотреть в каталоге</a>
    </main>
    <section class="about">
        <div class="txt">
            <p>JDM расшифровывается как
                "Japanese Domestic Market"
                или же "японский внутренний рынок".
                Так называется культура владения истинно японскими автомобилями, часто тюнингованными, а владельцев такой техники и называют как раз JDMщик</p>
        </div>
        <div class="img">
        <img src="{{ asset('storage/about.png') }}" alt="О нас">
        </div>
    </section>
    <h1>Самые популярные диски</h1>
    <section class="whells">
        @foreach($wheels as $item)
            <div class="wheel">
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
    </section>
    <section class="constraction">
    <h1>Наши проекты</h1>
    <div class="car-selector">
        <button onclick="showCar('mazda')">Mazda</button>
        <button onclick="showCar('toyota')">Toyota</button>
    </div>
    <div class="slider-container">
        <div class="slider" id="mazdaSlider">
            <div class="slide">
                <img src="{{ asset('storage/mazda/1.jpg') }}" alt="Mazda Проект 1">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/mazda/2.jpg') }}" alt="Mazda Проект 2">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/mazda/3.jpg') }}" alt="Mazda Проект 3">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/mazda/4.jpg') }}" alt="Mazda Проект 4">
            </div>
        </div>
        <div class="slider" id="toyotaSlider" style="display: none;">
            <div class="slide">
                <img src="{{ asset('storage/toyota/1.png') }}" alt="Toyota Проект 1">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/toyota/2.png') }}" alt="Toyota Проект 2">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/toyota/3.png') }}" alt="Toyota Проект 3">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/toyota/4.png') }}" alt="Toyota Проект 4">
            </div>
        </div>
        <div class="slider" id="nissanSlider" style="display: none;">
            <div class="slide">
                <img src="{{ asset('storage/nissan/1.jpg') }}" alt="Nissan Проект 1">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/nissan/2.jpg') }}" alt="Nissan Проект 2">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/nissan/3.jpg') }}" alt="Nissan Проект 3">
            </div>
            <div class="slide">
                <img src="{{ asset('storage/nissan/4.jpg') }}" alt="Nissan Проект 4">
            </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
    <script>
        let currentCar = 'mazda';

        function showCar(car) {
            document.getElementById(currentCar + 'Slider').style.display = 'none';
            document.getElementById(car + 'Slider').style.display = 'flex';
            currentCar = car;
            slideIndex = 0;
            showSlides();
        }

        function showSlides() {
            const slides = document.querySelector(`#${currentCar}Slider`);
            slides.style.transform = `translateX(${-slideIndex * 100}%)`;
        }

        function plusSlides(n) {
            const totalSlides = document.querySelectorAll(`#${currentCar}Slider .slide`).length;
            slideIndex += n;
            if (slideIndex < 0) {
                slideIndex = totalSlides - 1;
            } else if (slideIndex >= totalSlides) {
                slideIndex = 0;
            }
            showSlides();
        }

        showCar('mazda'); // Показываем Mazda по умолчанию

        var regModal = document.getElementById("loginModal");
        var authModal = document.getElementById("authModal");
        var regBtn = document.getElementById("regBtn");
        var loginBtn = document.getElementById("loginBtn");
        var spans = document.getElementsByClassName("close");
        window.onload = function() {
        var disclaimerModal = document.getElementById("disclaimerModal");
        var disclaimerSpan = disclaimerModal.getElementsByClassName("close")[0];

        disclaimerModal.style.display = "block";

        disclaimerSpan.onclick = function() {
            disclaimerModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == disclaimerModal) {
                disclaimerModal.style.display = "none";
            }
        }
    }
        regBtn.onclick = function() {
            regModal.style.display = "block";
            authModal.style.display = "none";
        }

        loginBtn.onclick = function() {
            authModal.style.display = "block";
        }

        for (let span of spans) {
            span.onclick = function() {
                regModal.style.display = "none";
                authModal.style.display = "none";
            }
        }

        window.onclick = function(event) {
            if (event.target == regModal) {
                regModal.style.display = "none";
            }
            if (event.target == authModal) {
                authModal.style.display = "none";
            }
        }

        document.querySelector("#loginModal form").onsubmit = function(e) {
            e.preventDefault();
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (name.length < 3) {
                alert("Имя пользователя должно содержать не менее 3 символов");
                return false;
            }
            if (!/\S+@\S+\.\S+/.test(email)) {
                alert("Введите корректный email");
                return false;
            }
            if (password.length < 6) {
                alert("Пароль должен содержать не менее 6 символов");
                return false;
            }

            this.submit();
        }

        document.getElementById("authForm").onsubmit = function(e) {
            e.preventDefault();
            var email = document.getElementById("auth_email").value;
            var password = document.getElementById("auth_password").value;
            alert("Авторизация успешна!");
            authModal.style.display = "none";
        }

    </script>
</body>
</html>
