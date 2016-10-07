呼び出し元の変数にアクセス: {{$var}}
<dl>
@foreach($arr2 as $k=>$v)
  <dt>{{$k}}</dt><dd>{{$v}}</dd>
@endforeach
</dl>