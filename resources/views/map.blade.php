<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Карта Яндекс</title>
    <style>
        #map {
            height: 900px; /* Установите высоту карты */
            width: 100%; /* Установите ширину карты */
        }
    </style>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>
<body>
    <div id="map"></div>

    <script>
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                center: [55.728599, 52.411083], // Установите начальные координаты
                zoom: 13 // Уровень масштабирования
            });
            
            // Добавьте маркер на карту
            var myPlacemark = new ymaps.Placemark([55.728599, 52.411655], {
                hintContent: 'тут!',
                balloonContent: 'JDM116 <br>Мастерская Японских автомобилей<br>Покупка деталий,детейлинг'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>
</body>
</html>
