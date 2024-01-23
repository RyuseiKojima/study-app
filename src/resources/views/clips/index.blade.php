@extends('layouts.app')

<head>
    <title>記事一覧</title>
</head>

@section('content')
    <div class="fs-3">記事一覧</div>
    <button type="submit" class="btn btn-primary my-1">新規登録</button>
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
                    @if ($movie->is_showing)
                        上映中
                    @else
                        上映予定
                    @endif
                </td>
                <td>{{ $movie->description }}</td>
                </td>
        @endforeach
    </table>
@endsection
