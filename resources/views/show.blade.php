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
            margin-left: 10px;
            padding: 30px;
            padding-right: 800px;
            margin-top: 10px; 
            font-size: 30px;
            border: 1px solid black;
            border-radius: 10px;
        }
        .details{
            padding-left: 100px;
        }
        img{
            width: 42.1%;
            height: 422px;
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
        .details > p{
            font-size: 25px;
            background-color: #D3D3D3;
            padding-left: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 700px;
            border-radius: 15px;
        }
        .back-link {
            text-decoration: none;
            padding-left: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 20px;
            border-radius: 15px;
            font-size: 25px;
            background-color: #87CEEB;
            border: 2px solid #4169E1;
        }
        .h1{
            margin-top: 0px;
            font-size: 40px;
            
        }
        .btn {
            background-color: #000000;
            border-radius: 10px;
            padding: 10px;
            margin-top: 20px;
            font-size: 18px;
            color: #ffffff;
        }
        .comments {
            list-style: none;
            padding: 10px;
        }
        .comments > li {
            padding: 5px;
            font-size: 22px;
            margin-bottom: 5px;
        }
        input {
            padding: 5px;
            padding-right: 30px;
            border-radius: 10px;
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
        <div>
            @if(Auth::check())
             <h2>Оставьте отзыв:</h2>
             <form action="{{ route('comments.share' , ['id' => $id])}}" method="POST">
                @csrf
                <input type="text" name="body" required><br>
                <button type="subbmit" class="btn">Отправить</button>
    </form>
    @else
    <p>Чтобы оставить отзыв, нужно зарегистрироваться или войти</p>
    @endif
    <h2>Отзывы:</h2>
    @if($comments->isEmpty())
    <p>Отзывов пока что нет</p>
    @else
    <ul class="comments">
        @foreach($comments as $comment)
        <li>{{$comment->author}} {{$comment->created_at}}:<br>{{$comment->body}}</li>
        @endforeach
    </ul>
    @endif
    </div>
    </div>
    </div>
</body>
</html>
