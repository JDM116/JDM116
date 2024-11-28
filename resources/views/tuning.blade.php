<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url('{{ asset('storage/fon.jpg') }}');
            margin:0;
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: 100vh; /* This will make the div take up the full height of the viewport */
            
        }
        header h1{
            text-align:center;
            background-color:black;
            color:white;
            margin: 0;
            padding: 8px;
        }
        
        
        .tuningcard img{
            width: 249px;
            height: 249px;
            border-right: 2px solid #000000; 
            margin: 30px;
            padding: 15px;
        }
        .tuningcards {
            color:white;
            display: flex;
            flex-wrap: wrap;
            gap: 30px; /* отступ между карточками */
            padding:50px;
            
    }

        .tuningcard {
            color: black;
            display: flex;
            border: 1px solid #000000; /* граница карточки */
            border-radius: 8px; /* закругленные углы */
            overflow: hidden; /* скрыть переполненные элементы */
            width: 710px; /* ширина карточки */
            flex: 1 1 calc(50% - 20px); /* макс. 2 карточки в строке с учетом отступа */
            
    }

        .tuningcard p{
            font-size: 30px;
        }

    .title{
        background-color: black;
        opacity: 0.6;
        border-radius: 10px;
        color: white;
        padding: 10px;
    }


        .txt {
            font-size: 20px;
            padding: 10px; /* отступы внутри текстового блока */
            display: flex;
            flex-direction: column; /* вертикальное размещение текста */
            justify-content: center; /* центрирование текста */
    }

        h2 {
            margin: 0; /* убрать отступы у заголовка */
            
    }

        p {
            margin: 5px 0; /* отступы между параграфами */
            
    }
    /* Центрирование области сортировки */

    

    .sorting {
        
        background-color: #ffffff;   /* Светлый фон для блока сортировки */
        padding: 5px;                /* Отступы внутри блока */
        height: 50px;
        text-align: center;    
        font-size: 32px;         /* Центральное выравнивание текста */
    }

    .sorting ul{
        list-style: none;             /* Убираем маркеры списка */
        padding: 0;  
        display: flex;             /* Вертикальное выравнивание списка */
        justify-content: space-around;
    }

    .sorting li {
        margin: 10px 0;     
    }

    .sorting a {
        font-size: 32px;            /* Размер шрифта ссылок */
        color: #000000;              /* Цвет текста ссылок */
        transition: color 0.3s;      /* Плавный переход цвета при наведении */
    }

    .sorting a:hover {
        color: #222222;              /* Цвет ссылки при наведении */
    }

    .sorting select {
        margin-left: 10px;           /* Отступ слева для селекта */
        padding: 5px;                /* Отступы внутри селекта */
        border: 1px solid #ced4da;   /* Граница селекта */
        border-radius: 4px;          /* Закругленные углы */
    }
    

    /* Мобильное разрешение */
    @media (max-width: 600px) {
        .sorting {
            padding: 10px;            /* Уменьшаем отступы на мобильных устройствах */
        }
    }
    </style>
</head>
<body>
    <header>
        <h1>ТЮНИНГ</h1>
    <header>
    
    <div class="sorting">
        <ul>
            <li><a href = "/">Главная</a></li>
            <li><a href="{{ route('tunings.index', ['sort_by' => 'title']) }}">Сортировать по названию</a></li>
            <li><a href="{{ route('tunings.index', ['sort_by' => 'cost']) }}">Сортировать по цене</a></li>
            <li>Тип
                <select name="type" id="type" onchange="filterByType(this.value)">
                    <option value="">Все</option>
                    <option value="Двигатель">Двигатель</option>
                    <option value="Выхлопная система">Выхлопная система</option>
                    <option value="Подвеска">Подвеска</option>
                </select>
            </li>
        </ul>
    </div>
    <div class="tuningcards">
        @foreach ($tunings as $tuning)
            <div class="tuningcard">
                <a href="{{ route('tunings.more', ['id' => $tuning->id]) }}">
                    <img src='{{ $tuning->image }}' alt="{{ $tuning->title }}">
                </a>
                <div class="txt">
                    <p class="title">Название: {{ $tuning->title }}</p>
                    <p>Тип: {{ $tuning->type }}</p>
                    <p>Количество: {{ $tuning->amount }} шт</p>
                    <p>Стоимость: {{ $tuning->cost }} ₽</p>
                </div>
            </div>
        @endforeach
    </div>
    

    <script>
        function filterByType(type) {
            const url = new URL(window.location.href);
            url.searchParams.set('type', type);
            window.location.href = url.toString(); // Перенаправляем на обновленный URL
        }
    </script>
</body>
</html>