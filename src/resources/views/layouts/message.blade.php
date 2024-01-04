@if ($errors->any())
<!-- 何かしらエラーが起きた時 　bool型-->
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <!-- $errors->all() ただの配列　$errorsはインスタンス-->
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif