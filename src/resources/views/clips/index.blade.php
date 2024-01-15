<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>

    <title>Clip</title>
</head>
<body>
<h1>記事一覧</h1>

<form action="logout" method="POST">
  <!-- @method('DELETE') -->
  @csrf
    <div>
      <button type="submit"  class="btn btn-primary btn-lg">{{ __('ログアウト') }}</button>
    </div>
</form>
<!--検索フォーム-->
<form method="GET" action="clips">
  <label for="keyword">キーワード</label>
  <!--入力-->
  <div>
    <input type="text" name="keyword" />
  </div>
  <!--絞り込み-->  
  <label>上映中かどうか</label>
  <div>
    <input type="radio" id="all" name="is_showing" value="" checked />すべて
  </div>
  <div>
    <input type="radio" id="上映予定" name="is_showing" value="1" />上映中
  </div>
  <div>
    <input type="radio" id="上映中" name="is_showing" value="0" />上映予定
  </div>
  
  <div>
    <button type="submit" class="btn btn-primary ">検索</button>
  </div>
</form>
<table border="1">
    <tr>
      <th>映画タイトル</th>
      <th width="150px">画像URL</th>
      <th>公開年</th>
      <th>上映中かどうか</th>
      <th>概要</th>
    </tr>
    @foreach ($clips as $movie)
      <tr>
        <td><a href="clips/{{ $movie->id }}">{{ $movie->title }}</a></td>
        <td><img style="max-width: 150px;" src="{{ $movie->image_url }}" alt=""></td>
        <td>{{ $movie->published_year }}</td>
        <td>
          @if ( $movie->is_showing )
            上映中
          @else
            上映予定
          @endif
        </td>
        <td>{{ $movie->description }}</td>
      </td>
    @endforeach
  </table>
</body>
</html>