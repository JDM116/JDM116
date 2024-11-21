<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminPanel</title>
</head>
    <style>
        /* Сброс стилей */
body, h1, form, label, input, select {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Основные стили для тела документа */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0; /* Светлый фон */
    color: #333; /* Темный текст */
    line-height: 1.6;
    padding: 20px;
}

/* Стили для заголовков */
h1 {
    color: #222; /* Очень темный текст для заголовков */
    margin-bottom: 15px;
}

/* Стили для форм */
form {
    background-color: #fff; /* Белый фон для формы */
    border: 1px solid #ccc; /* Светло-серая рамка */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px; /* Отступ между формами */
}

/* Стили для меток */
label {
    display: block; /* Чтобы метки занимали всю ширину */
    margin-bottom: 5px;
}

/* Стили для полей ввода */
input[type="text"],
input[type="number"],
input[type="password"],
input[type="email"],
select {
    width: 100%; /* Ширина полей ввода на всю ширину формы */
    padding: 10px;
    margin-bottom: 15px; /* Отступ между полями */
    border: 1px solid #ccc; /* Светло-серая рамка */
    border-radius: 4px; /* Закругленные углы */
}

/* Стили для кнопок */
input[type="submit"] {
    background-color: #333; /* Темный фон для кнопки */
    color: #fff; /* Белый текст на кнопке */
    padding: 10px 15px; /* Отступ внутри кнопки */
    border: none;
    border-radius: 4px; /* Закругленные углы */
    cursor: pointer; /* Курсор при наведении */
    transition: background-color 0.3s; /* Плавный переход цвета */
}

input[type="submit"]:hover {
    background-color: #555; /* Более светлый фон на наведение */
}

    </style>
<body>
    <a href="/tunings">На главную</a>
    <h1>Админ панель</h1>
<h1>Добавление нового товара</h1>
<form action="/admin/add" method="POST">
    @csrf
    <label for="title">Название товара:</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Описание товара:</label><br>
    <input type="text" id="description" name="description" required><br><br>

    <label for="image">URL изображения:</label><br>
    <input type="text" id="image" name="image" required><br><br>

    <label for="amount">Количество:</label><br>
    <input type="number" id="amount" name="amount" required><br><br>
    <label for="type">Тип товара:</label><br>
    <select name="type" id="type" onchange="filterByType(this.value)">
        <option value="">Все</option>
        <option value="Двигатель">Двигатель</option>
        <option value="Выхлопная система">Выхлопная система</option>
        <option value="Подвеска">Подвеска</option><br>
        <option value="Диски">Диски</option><br>
    </select><br>

    <label for="cost">Цена:</label><br>
    <input type="number" id="cost" name="cost" required><br><br>

    <input type="submit" value="Сохранить">
</form>

    <h1>Удаление товара</h1>
    <form action="{{ route('admin.remove') }}" method="POST">
        @csrf
        <label for="id">ID товара:</label><br>
        <input type="number" id="id" name="id" required><br><br> 
        <input type="submit" value="Удалить">
    </form>

    {{-- @foreach ($tunings as $tuning)
                    <p>Номер {{ $tuning->id }}:</p>
                    <p class="title">Название: {{ $tuning->title }}</p>
                    <form action="{{ route('admin.remove') }}" method="POST">
                        @csrf
                        <input type="submit" value="Удалить">
                    </form>
                    
        @endforeach --}}

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Регистрация новых пользователей</h2>
            <form action ="/reg">
                <label for="name">Имя пользователя:</label><br>
                <input type="text" id="name" name="name"><br><br>
                <label for="password">Пароль:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <label for="email">E-mail:</label><br>
                <input type="email" id="email" name="email"><br><br>
                <select name="role" id="role" onchange="filterByType(this.value)">
                    <option value="">Выберите роль</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select><br>
                <input type="submit" value="Зарегистрировать">
            </form>
        
</body>
</html>