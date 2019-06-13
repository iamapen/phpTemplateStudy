<?php
/**
 * @var League\Plates\Template\Template $this
 */
use Poppy\TemplateStudy\Def;
?>
<?php $this->layout('layouts/default.plates33', ['title'=>'基本'])?>

<h1>感想</h1>
http://platesphp.com/v3/templates/
<p>
  生＋αなので、生よりはいいってことになる。
</p>
いいところ
<ul>
  <li>ライト</li>
  <li>layout, inheritance があるので生PHPよりは構造化しやすい</li>
  <li>syntaxがphpに近いというか制御文が生php</li>
</ul>
悪いところ
<ul>
</ul>
その他の特徴
<ul>
  <li>import/fetch から、親スコープの変数にアクセスできない</li>
</ul>


<h2>変数</h2>
<dl>
  <dt>スカラー</dt><dd><?=$var?></dd>
  <dt>配列</dt><dd><?=$arr1[0]?></dd>
  <dt>連想配列</dt><dd><?=$arr2['key1']?></dd>
</dl>


<h2>オブジェクト</h2>
<dl>
  <dt>メソッド</dt>
  <dd><?=$user->getFullName()?></dd>

  <dt>クラス定数</dt>
  <dd><?=Poppy\TemplateStudy\Def\Gender::MALE?></dd>
  <dd><?=Def\Gender::FEMALE?></dd>

  <dt>クラスメソッド</dt>
  <dd><?=Poppy\TemplateStudy\Def\Gender::getGenderLabel(Poppy\TemplateStudy\Def\Gender::MALE)?></dd>
  <dd><?=Def\Gender::getGenderLabel(Def\Gender::FEMALE)?></dd>
</dl>


<h1>制御構造</h1>
<h2>if</h2>
<?php if($user->getGender() === Def\Gender::MALE):?>
男です
<?php elseif($user->getGender() === Def\Gender::FEMALE):?>
女です
<?php else:?>
不明です
<?php endif?>


<h2>forループ</h2>
<?php for($i=0; $i<count($arr1); $i++):?>
<ul>
  <li><?=$i?> => <?=$arr1[$i]?></li>
</ul>
<?php endfor?>


<h2>foreachループ</h2>
<?php foreach($arr2 as $k=>$v):?>
<ul>
  <li><?=$k?> => <?=$v?></li>
</ul>
<?php endforeach?>


<h2>whileループ</h2>
<?php while(false):?>
<?php endwhile?>


<h2>特殊：空考慮のforループ</h2>
存在しない


<h2>特殊：空考慮のforeachループ</h2>
存在しない


<h1>演算</h1>
<h2>四則演算</h2>
<dl>
  <dt>1 + 2</dt><dd><?=1 + 2?></dd>
</dl>


<h2>論理演算</h2>
<dl>
  <dt>true AND false</dt><dd><?=number_format(true && false)?></dd>
  <dt>true OR false</dt><dd><?=number_format(true || false)?></dd>
  <dt>!true</dt><dd><?=number_format(!true)?></dd>
</dl>


<h2>比較演算</h2>
<dl>
  <dt>1 == '1'</dt><dd><?=number_format(1 == '1')?></dd>
  <dt>1 === '1'</dt><dd><?=number_format(1 === '1')?></dd>
  <dt>1 >= 1</dt><dd><?=number_format(1 >= 1)?></dd>
  <dt>1 > 1</dt><dd><?=number_format(1 > 1)?></dd>
</dl>


<h2>三項演算</h2>
<dl>
  <dt>true ? 'yes' : 'no'</dt><dd><?=true ? 'yes' : 'no'?></dd>
  <dt>false ? 'yes' : 'no'</dt><dd><?=false ? 'yes' : 'no'?></dd>
</dl>


<h2>エスケープ</h2>
<dl>
  <dt>default</dt><dd><?=$htmlString?></dd>
  <dt>raw</dt><dd><?=$htmlString?></dd>
  <dt>htmlEscape</dt><dd><?=$this->e($htmlString)?></dd>
  <dt>urlencode</dt><dd><?=rawurlencode($htmlString)?></dd>

  <dt>デリミタエスケープ</dt><dd><\??></dd>
</dl>


<h1>include</h1>
<?=$this->fetch('./overview/include/list.plates33', ['list'=>$arr2])?>


<h1>その他</h1>
<dl>
  <dt>コメントアウト</dt><dd><?php//--コメント--?></dd>
  <dt>配列カウント</dt><dd><?=count($arr1)?></dd>

  <dt>dump</dt><dd><?=var_export($arr1, true)?></dd>
  <dt>truncate</dt><dd><?=str_limit(1234567890, 5)?></dd>
  <dt>number_format</dt><dd><?=number_format('12345')?></dd>
  <dt>json_encode</dt><dd><?=json_encode($arr1, JSON_HEX_TAG|JSON_HEX_APOS |JSON_HEX_QUOT)?></dd>

  <dt>システム日付</dt><dd><?=date('Y-m-d H:i:s')?></dd>
  <dt>変数作成</dt><dd><?php $newVar='hoge'?><?=$newVar?></dd>

  <dt>文字列結合</dt><dd><?=$var.$var?></dd>
  <dt>文字列結合</dt><dd><?=$user->getFirstName().$user->getLastName()?></dd>
</dl>
