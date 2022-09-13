<h1>編集ページ</h1>
@if ($errors->any())
	<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif
<div>
  <form action="{{ route('rooms.update', $room) }}"
        method="post" enctype="multipart/form-data"
        enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <label for="room-name">部屋名</label>
    <input id="room-name" type="text" name="name" value="{{ $room->name }}"><br>
    <label for="room-price">金額</label>
    <input id="room-name" type="text" name="price" value="{{ $room->price }}"><br>
    <label for="room-adress">住所</label>
    <input id="room-name" type="text" name="adress" value="{{ $room->adress}}"><br>
    <label for="room-introduction">説明文</label>
    <textarea id="room-introduction" type="text" name="introduction">{{ $room->introduction }}</textarea><br>
    <label for="room-image">画像</label>
    <img src=" {{ asset('storage/' . $room->image) }} " height="70" width="90"><br>
    <input id="room-image" type="file" name="image" value="aa"><br>
    <button type="submit">登録</button>
</div>

<a href="{{ route('rooms.index') }}">戻る</a>