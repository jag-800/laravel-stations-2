<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>映画の新規登録</title>
</head>
<body>
<h1>映画の新規登録</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <label for="title">映画タイトル:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="image_url">画像URL:</label>
        <input type="url" id="image_url" name="image_url" required><br>

        <label for="published_year">公開年:</label>
        <input type="number" id="published_year" name="published_year" required><br>

        <label for="is_showing">上映中かどうか:</label>
        <input type="checkbox" id="is_showing" name="is_showing" value="1"><br>

        <label for="description">概要:</label>
        <textarea id="description" name="description" required></textarea><br>

        <button type="submit">登録する</button>
    </form>
</body>
</html>