<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <ul>
    @foreach ($adminMovies as $movie)
        <li>映画タイトル: {{ $movie->title }}</li>
        <li>画像URL: {{ $movie->image_url }}</li>
        <li>公開年: {{ $movie->published_year }}</li>
        <li>上映中かどうか: 
            @if($movie->is_showing)
              上映中
            @else
              上映予定
            @endif
          </li>
        <li>概要: {{ $movie->description }}</li>
    @endforeach
    </ul>
</body>
</html>