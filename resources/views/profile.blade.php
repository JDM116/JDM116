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
           .profile img{
                border-radius: 50px;
                width:100px;
                height: 100px;
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
                <li><p>Привет: Логин</p>
                <li><a href="#">Редактировать профиль</a><br></li>
                <li><a href="#">Редактировать профиль</a><br></li>
                <li><a href="#">Редактировать профиль</a><br></li>
                <li><a href="#">Редактировать профиль</a><br></li>
                <li><a href="#">Редактировать профиль</a><br></li>
                <li><a href="#">Редактировать профиль</a><br></li>
            </ul>
        </div>
        <div class="special">
            <h2>Скидка 10%</h2>
            <p><a href="#">Применить скидку к заказу</a></p>
            <h3>Избранное</h3>
            <a href="/tunings">В каталог</a>
        </div>
    </section>
</body>
</html>