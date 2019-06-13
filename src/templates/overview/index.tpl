{extends file='layouts/default.tpl'}
{block name=title}基本{/block}

{block name=content}
<h1>感想</h1>
http://www.smarty.net/docs/ja/
<p>
  設計が古い。<br>
</p>
いいところ
<ul>
</ul>
悪いところ
<ul>
  <li>forループの終了条件の記述がPHPと違う</li>
  <li>三項演算ができない。PHP7の恩恵も受けられない</li>
  <li>use が使えないのでクラス定数の名前空間を短くできない</li>
</ul>
その他の特徴
<ul>
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

  <dt>クラスメソッド</dt>
  <dd>{{Poppy\TemplateStudy\Def\Gender::getGenderLabel(Poppy\TemplateStudy\Def\Gender::MALE)}}</dd>
</dl>


<h1>制御構造</h1>
<h2>if</h2>
{if ($user->getGender() === Poppy\TemplateStudy\Def\Gender::MALE)}
男です
{elseif ($user->getGender() === Poppy\TemplateStudy\Def\Gender::FEMALE)}
女です
{else}
不明です
{/if}


<h2>forループ</h2>
{for $i=0 to count($arr1)-1 step 1}
<ul>
  <li>{{$i}} => {{$arr1[$i]}}</li>
</ul>
{/for}


<h2>foreachループ</h2>
{foreach $arr2 as $k=>$v}
<ul>
  <li>{{$k}} => {{$v}}</li>
</ul>
{/foreach}


<h2>whileループ</h2>
{while (false)}
{/while}

<h2>特殊：空考慮のforループ</h2>
{for $i=0 to count($arr1)-1 step 1}
<ul>
  <li>{{$k}} => {{$v}}</li>
</ul>
{forelse}
empty
{/for}

{for $i=0 to count([])-1 step 1}
  <ul>
    <li>{{$k}} => {{$v}}</li>
  </ul>
{forelse}
  empty
{/for}


<h2>特殊：空考慮のforeachループ</h2>
{foreach $arr2 as $k=>$v}
  <ul>
    <li>{{$k}} => {{$v}}</li>
  </ul>
{foreachelse}
  empty
{/foreach}

{foreach [] as $k=>$v}
  <ul>
    <li>{{$k}} => {{$v}}</li>
  </ul>
{foreachelse}
  empty
{/foreach}


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
  <dt>true ? 'yes' : 'no'</dt><dd>{if true}yes{else}no{/if}</dd>
  <dt>false ? 'yes' : 'no'</dt><dd>{if false}yes{else}no{/if}</dd>
</dl>


<h2>エスケープ</h2>
<dl>
  <dt>default</dt><dd>{{$htmlString}}</dd>
  <dt>raw</dt><dd>{{$htmlString nofilter}}</dd>
  <dt>htmlEscape</dt><dd>{{$htmlString|escape:'html'}}</dd>
  <dt>urlencode</dt><dd>{{$htmlString|rawurlencode}}</dd>

  <dt>デリミタエスケープ</dt><dd>{literal}{{ test }}{/literal}</dd>
</dl>


<h1>include</h1>
{include file='./include/list.tpl' list=$arr2}


<h1>その他</h1>
<dl>
  <dt>コメントアウト</dt><dd>{*コメント*}</dd>
  <dt>配列カウント</dt><dd>{{count($arr1)}}</dd>

  <dt>dump</dt><dd>{{var_dump($arr1)}}</dd>
  <dt>truncate</dt><dd>{{str_limit(1234567890, 5)}}</dd>
  <dt>number_format</dt><dd>{{number_format('12345')}}</dd>
  <dt>json_encode</dt><dd><?=json_encode($arr1, JSON_HEX_TAG|JSON_HEX_APOS |JSON_HEX_QUOT)?></dd>

  <dt>システム日付</dt><dd>{{date('Y-m-d H:i:s')}}</dd>
  <dt>変数作成</dt><dd>{$newVar='hoge'}{{$newVar}}</dd>

  <dt>文字列結合</dt><dd>{$var|cat:$var}</dd>
  <dt>文字列結合</dt><dd>{$user->getFullName()|cat:$user->getFullName()}</dd>
</dl>
{/block}
