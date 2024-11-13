<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JDM116</title>
    <style>
        body, html {
            background-color: black;
            margin: auto;
            padding: auto;
            text-align: center;
            color: white;
        }
        header {
            display: flex;
            justify-content: space-around;
            height:0px;
            
        }
        header img {
            width: 250px;
            height: 100px;
            
        }
        
        header {
            
            color: white; /* Цвет текста можно настроить по желанию */
            
        }
        a {
            
            border: rgb(255, 255, 255) 1px solid;
            padding: 10px;
            text-decoration: none;
            color: white;
            font-size: 24px;
            
            
        }
        a:hover{
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
            padding: 10px;
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

                
    </style>
</head>
<body>
    <header>
        <p><a href="#">Наши салоны</a></p>
        <img src="{{ asset('storage/logo.svg') }}" alt="Логотип">
        <p>Контактный номер: 8 800 808-88-88</p>
    </header>
    <main>
        <a href="#">Смотреть в каталоге</a>
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
                <img src="{{ $item->image }}" alt="{{ $item->title }}">
                <div>
                    <h2>{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p>
                    <p>{{ $item->cost }} ₽</p>
                </div>
            </div>
        @endforeach
    </section>
    
</body>
</html>
