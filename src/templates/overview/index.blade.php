<?php
use Poppy\TemplateStudy\Def;
?>
@extends('layouts.default')
@section('title', '基本')

@section('content')
<h1>感想</h1>
https://readouble.com/laravel/5.1/ja/blade.html
<p>
  機能も揃っているし、構文がPHPに近いので学習コストが低い。最強では？<br>
</p>
いいところ
<ul>
  <li>機能豊富</li>
  <li>構文がPHPに近いので学習コストが低い</li>
  <li>useでクラス定数の名前空間を短くできる</li>
</ul>
悪いところ
<ul>
</ul>
その他の特徴
<ul>
  <li>いざとなったらPHPコードが書ける</li>
</ul>


<h2>変数</h2>
<dl>
  <dt>スカラー</dt><dd>{{$var}}</dd>
  <dt>配列</dt><dd>{{$arr1[0]}}</dd>
  <dt>連想配列</dt><dd>{{$arr2['key1']}}</dd>
</dl>


<h2>オブジェクト</h2>
<dl>
  <dt>メソッド</dt>
  <dd>{{$user->getFullName()}}</dd>

  <dt>クラス定数</dt>
  <dd>{{Poppy\TemplateStudy\Def\Gender::MALE}}</dd>
  <dd>{{Def\Gender::FEMALE}}</dd>

  <dt>クラスメソッド</dt>
  <dd>{{Poppy\TemplateStudy\Def\Gender::getGenderLabel(Poppy\TemplateStudy\Def\Gender::MALE)}}</dd>
  <dd>{{Def\Gender::getGenderLabel(Def\Gender::FEMALE)}}</dd>
</dl>


<h1>制御構造</h1>
<h2>if</h2>
@if($user->getGender() === Def\Gender::MALE)
男です
@elseif($user->getGender() === Def\Gender::FEMALE)
女です
@else
不明です
@endif


<h2>forループ</h2>
@for($i=0; $i<count($arr1); $i++)
<ul>
    <li>{{$i}} => {{$arr1[$i]}}</li>
</ul>
@endfor


<h2>foreachループ</h2>
@foreach($arr2 as $k=>$v)
<ul>
    <li>{{$k}} => {{$v}}</li>
</ul>
@endforeach


<h2>whileループ</h2>
@while(false)
@endwhile


<h2>特殊：空考慮のforループ</h2>
存在しない


<h2>特殊：空考慮のforeachループ</h2>
@forelse($arr2 as $k=>$v)
  <ul>
    <li>{{$k}} => {{$v}}</li>
  </ul>
@empty
  empty
@endforelse

@forelse([] as $k=>$v)
  <ul>
    <li>{{$k}} => {{$v}}</li>
  </ul>
@empty
  empty
@endforelse


<h1>演算</h1>
<h2>四則演算</h2>
<dl>
  <dt>1 + 2</dt><dd>{{1 + 2}}</dd>
</dl>


<h2>論理演算</h2>
<dl>
  <dt>true AND false</dt><dd>{{number_format(true && false)}}</dd>
  <dt>true OR false</dt><dd>{{number_format(true || false)}}</dd>
  <dt>!true</dt><dd>{{number_format(!true) }}</dd>
</dl>


<h2>比較演算</h2>
<dl>
  <dt>1 == '1'</dt><dd>{{number_format(1 == '1')}}</dd>
  <dt>1 === '1'</dt><dd>{{number_format(1 === '1')}}</dd>
  <dt>1 >= 1</dt><dd>{{number_format(1 >= 1)}}</dd>
  <dt>1 > 1</dt><dd>{{number_format(1 > 1)}}</dd>
</dl>


<h2>三項演算</h2>
<dl>
  <dt>true ? 'yes' : 'no'</dt><dd>{{true ? 'yes' : 'no'}}</dd>
  <dt>false ? 'yes' : 'no'</dt><dd>{{false ? 'yes' : 'no'}}</dd>
</dl>


<h2>エスケープ</h2>
<dl>
  <dt>default</dt><dd>{{$htmlString}}</dd>
  <dt>raw</dt><dd>{!! $htmlString !!}</dd>
  <dt>htmlEscape</dt><dd>なし？</dd>
  <dt>urlencode</dt><dd>{{rawurlencode($htmlString)}}</dd>

  <dt>デリミタエスケープ</dt><dd>@{{ test }}</dd>
</dl>


<h1>include</h1>
@include('./overview/include/list', ['list'=>$arr2])


<h1>その他</h1>
<dl>
  <dt>コメントアウト</dt><dd>{{--コメント--}}</dd>
  <dt>配列カウント</dt><dd>{{count($arr1)}}</dd>

  <dt>dump</dt><dd>{{var_export($arr1, true)}}</dd>
  <dt>truncate</dt><dd>{{str_limit(1234567890, 5)}}</dd>
  <dt>number_format</dt><dd>{{number_format('12345')}}</dd>
  <dt>json_encode</dt><dd><?=json_encode($arr1, JSON_HEX_TAG|JSON_HEX_APOS |JSON_HEX_QUOT)?></dd>

  <dt>システム日付</dt><dd>{{date('Y-m-d H:i:s')}}</dd>
  <dt>変数作成</dt><dd><?php $newVar='hoge'?>{{$newVar}}</dd>

  <dt>文字列結合</dt><dd>{{$var.$var}}</dd>
  <dt>文字列結合</dt><dd>{{$user->getFullName().$user->getFullName()}}</dd>
</dl>
@endsection
