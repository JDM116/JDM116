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
            padding: 55px;
        }
        

        .tuningcard img{
            width: 249px;
            height: 249px;
        }
        .tuningcards {
            color:white;
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* отступ между карточками */
            padding:50px;
    }

        .tuningcard {
            background-color: #828282;
            display: flex;
            border: 1px solid #ccc; /* граница карточки */
            border-radius: 8px; /* закругленные углы */
            overflow: hidden; /* скрыть переполненные элементы */
            width: 710px; /* ширина карточки */
            flex: 1 1 calc(50% - 20px); /* макс. 2 карточки в строке с учетом отступа */
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
        background-color: #f8f9fa;   /* Светлый фон для блока сортировки */
        padding: 20px;                /* Отступы внутри блока */
        border: 1px solid #dee2e6;    /* Граница вокруг блока */
        border-radius: 8px;          /* Закругленные углы */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Немного тени */
        text-align: center;           /* Центральное выравнивание текста */
    }

    .sorting ui {
        list-style: none;             /* Убираем маркеры списка */
        padding: 0;                  /* Убираем внутренние отступы */
    }

    .sorting li {
        margin: 10px 0;              /* Отступы между элементами списка */
    }

    .sorting a {
        text-decoration: none;        /* Убираем подчеркивание ссылок */
        color: #007bff;              /* Цвет текста ссылок */
        font-weight: bold;           /* Жирный шрифт для ссылок */
        transition: color 0.3s;      /* Плавный переход цвета при наведении */
    }

    .sorting a:hover {
        color: #0056b3;              /* Цвет ссылки при наведении */
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
                <img src='{{ $tuning->image }}'>
                <div class="txt">
                    <p>Название: {{ $tuning->title }}</p>
                    <p>Тип: {{ $tuning->type }}</p>
                    <p>Количество: {{ $tuning->amount }} шт</p>
                    <p>Стоимость: {{ $tuning->cost }} ₽</p>
                    <form action='#' method="POST">
                        @csrf
                        <button type="submit">Добавить в корзину</button>
                    </form>
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