<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
                maximum-scale=1.0, minnimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="resources/css/app.css">
  <title>sample</title>
</head>
<body>
  <h1>一覧ページ</h1>
  @if (session('feedback.success'))
    <p style="color: green;
              font-size:large">{{ session('feedback.success') }}</p>
  @endif
  <div>
    @foreach($rooms as $room)
      <table>
        <tr>
          <th>名前</th>
          <th>金額</th>
          <th>住所</th>
          <th>紹介文</th>
          <th>画像</th>
        </tr>
        <tr>
          <td><p>{{ $room->name }}</p></td>
          <td><p>{{ $room->price }}</p></td>
          <td><p>{{ $room->adress }}</p></td>
          <td><p>{{ $room->introduction }}</p></td>
          <td>
            <a href="{{ route('rooms.show', $room) }}">
              <img src=" {{ asset('storage/' . $room->image) }} " height="70" width="90">
            </a>
          </td>
          <td><a href ="{{ route('rooms.edit', $room) }}"><button>編集</button></a></td>
          <td>
            <form action="{{ route('rooms.destroy', $room->id) }}" 
                  method = "post">
              @csrf
              @method('DELETE')
              <button type="submit">削除</button>
            </form>
          </td>
          <hr>
        </tr>
      </table>
    @endforeach
    <hr>
  </div>
  <a href="{{ route('rooms.create') }}">新規作成</a>
</body>
