<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <style>
        body {
    background-color: #f8f9fa; /* светло-серый фон для контраста */
    font-family: Arial, sans-serif;
    color: #333;
}

.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff; /* белый фон для контейнера */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.cart-info h2 {
    text-align: center;
    color: #dc3545; /* красный цвет для заголовка */
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.table th {
    background-color: #343a40; /* темный фон для заголовков таблицы */
    color: #fff; /* белый цвет для текста */
}

.table tbody tr:hover {
    background-color: #f2f2f2; /* светло-серый фон при наведении */
}

.img-thumbnail {
    border: 2px solid #dc3545; /* красная рамка для изображений */
}

.btn {
    border-radius: 5px;
    
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
    cursor: pointer;
}

.btn-danger:hover {
    background-color: #c82333; /* более темный красный при наведении */
}

.summary {
    margin-top: 20px;
    text-align: right;
    font-weight: bold;
    font-size: 1.2em;
    
}
.button-order{
    margin-top: 30px;
}
.button-order a {
    background-color: #28a745; /* зеленая кнопка "Заказать" */
    color: white;
    
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.button-order a:hover {
    background-color: #218838; /* темно-зеленый при наведении */
}

.alert-success {
    background-color: #d4edda; /* светло-зеленый фон для успешных сообщений */
    color: #155724; /* темно-зеленый для текста */
    border: 1px solid #c3e6cb; /* светло-зеленая рамка */
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}
footer{
        margin-top:30px;
        border-top: 3px solid black;
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
        color:black;
    }
    

    </style>
</head>
<body>
    
    <div class="container mt-5">
        <div class="cart-info">
            <h2>Корзина</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(count($cartItems) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $id => $details)
                            <tr>
                                <td>
                                    <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" width="50" height="50" class="img-thumbnail">
                                    {{ $details['name'] }}
                                </td>
                                <td>{{ $details['price'] }} руб.</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>{{ $details['price'] * $details['quantity'] }} руб.</td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="summary">
                    <strong>Итого: {{ $total }} руб.</strong>
                    <div class="button-order">
                        <a href="" class="btn btn-success mt-3">Заказать</a>
                    </div>
                </div>
            @else
                <p>Ваша корзина пуста.</p>
            @endif
            <a href="/tunings" class="btn btn-primary mt-3">Продолжить покупки</a>
        </div>
    </div>
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
