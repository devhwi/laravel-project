<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>제목</th>
        <th>작성자</th>
      </tr>
    </thead>
    <tbody>
      @forelse($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->user->name}}</td>
      </tr>
      @empty
      <tr>
        <td colspan=2>글이 없습니다.</td>
      </tr>
      @endforelse
    </tbody>
    <tfoot>
      @if($posts)
        <div class="text-center">
          {!! $posts->render() !!}
        </div>
      @endif
    </tfoot>
  </table>
</div>