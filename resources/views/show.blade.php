<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tuning->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            
        }
        .morecard{
            width: 1000px;
            display: flex;
            margin:auto;
            padding: 30px;
            margin-top: 200px; 
            font-size: 30px;
            border: 2px solid black;
            border-radius: 10px;
        }
        .details{
            padding-left: 100px;
        }
        img{
            width: 42.1%;
            height: 422px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);
        }
        .imgcards img{
            width: 100px;
            height: 100px;
            display: table-column;
            border: 1px solid black;
            margin: 5px;
            border-radius: 5px;
            margin-top:0px;
        }
        .cost{
            color: red;
            font-size: 35px; 
        }
        p, .back-link{
            margin: 10px;
            font-size: 25px;
        }
        .h1{
            margin : 10px;
            font-size: 40px;
            
        }

    </style>
</head>
<body>
  
    <div class="morecard">
        <div class="imgcards">
            <img src="{{ $tuning->image }}" alt="{{ $tuning->title }}">
            <img src="{{ $tuning->image }}" alt="{{ $tuning->title }}">
            <img src="{{ $tuning->image }}" alt="{{ $tuning->title }}">
            <img src="{{ $tuning->image }}" alt="{{ $tuning->title }}">
        </div>
        <img src="{{ $tuning->image }}" alt="{{ $tuning->title }}">

        <div class="details">
            <p class="h1">{{ $tuning->title }}</p>
            <p class="cost">{{ $tuning->cost }} ₽</p>
            <p>Тип:{{ $tuning->type }}</p>
            <p>Количество: {{ $tuning->amount }} шт</p>
            
            <p>Описание:{{ $tuning->description }}</p>
            <a href="/tunings" class="back-link">Назад к списку</a>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $tuning->id }}">
                <button type="submit" class="btn btn-primary">Добавить в корзину</button>
            </form>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @session('status')
                <div class="p-4 bg-green-100">
                    {{ $value }}
                </div>
            @endsession
        </div>

        
    </div>
</body>
</html>
