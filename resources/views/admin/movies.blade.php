<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>映画タイトル</th>
        <th>画像URL</th>
        <th>公開年</th>
        <th>上映中かどうか</th>
        <th>概要</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($adminMovies as $movie)
        <tr>
          <td>{{ $movie->title }}</td>
          <td><img src="{{ $movie->image_url }}" alt="movie image" style="width:100px;"></td>
          <td>{{ $movie->published_year }}</td>
          <td>
            @if($movie->is_showing)
              上映中
            @else
              上映予定
            @endif
          </td>
          <td>{{ $movie->description }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>