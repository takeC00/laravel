<h1>詳細ページ</h1>
<div style="text-align: center" >
  <h2>{{ $room->name }}</h2>
  <img src=" {{ asset('storage/' . $room->image) }} " height="160" width="250"
        style="text-align: center">
</div>
<a href ="{{ route('rooms.edit', $room) }}"><button>編集</button></a></td>
<form action="{{ route('rooms.destroy', $room->id) }}" 
      method = "post">
      @csrf
      @method('DELETE')
      <button type="submit">削除</button>
</form>


<a href="{{ route('rooms.index') }}">戻る</a>