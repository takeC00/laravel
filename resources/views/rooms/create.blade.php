<h1>登録ページ</h1>
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
  <form action="{{ route('rooms.store') }}" 
        method="post" 
        enctype="multipart/form-data">
    @csrf
    <label for="room-name">部屋名</label>
    <input id="room-name" type="text" name="name"><br>
    <label for="room-price">金額</label>
    <input id="room-name" type="text" name="price" placeholder="￥●●● / 1日"><br>
    <label for="room-adress">住所</label>
    <input id="room-name" type="text" name="adress"><br>
    <label for="room-introduction">説明文</label>
    <textarea id="room-introduction" type="text" name="introduction"></textarea><br>
    <label for="room-image">画像</label>
    <input id="room-image" type="file" name="image"><br>
    <button type="submit">登録</button>
  </form>
</div>

<a href="{{ route('rooms.index') }}">戻る</a>