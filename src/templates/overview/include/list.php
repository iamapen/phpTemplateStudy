呼び出し元の変数にアクセス: <?=$var?>
<dl>
<?php foreach($list as $k=>$v):?>
  <dt><?=$k?></dt><dd><?=$v?></dd>
<?php endforeach?>
</dl>