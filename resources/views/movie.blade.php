<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<h1>映画リスト</h1>
	<form action="{{ route('movie') }}" method="GET">
    <div>
			<label for="keyword">キーワード:</label>
			<input type="text" id="keyword" name="keyword" placeholder="タイトルまたは概要を検索" value="{{ request('keyword') }}">
    </div>
    <div>
			<label><input type="radio" name="is_showing" value="all" {{ request('is_showing') === 'all' ? 'checked' : '' }}> すべて</label>
			<label><input type="radio" name="is_showing" value="1" {{ request('is_showing') == '1' ? 'checked' : '' }}> 公開中</label>
			<label><input type="radio" name="is_showing" value="0" {{ request('is_showing') == '0' ? 'checked' : '' }}> 公開予定</label>
    </div>
    <button type="submit">検索</button>
	</form>

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
      @foreach ($movies as $movie)
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


  {{ $movies->appends(request()->query())->links() }}
</body>
</html>