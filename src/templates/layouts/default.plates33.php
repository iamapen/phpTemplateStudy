<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHPテンプレートおべんきょ - Plates-3.3.0 <?=$this->e($title)?></title>

  <link rel="stylesheet" href="/css/ress.css">
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<?=$this->section('emptySlot')?>
<div class="container">
<?=$this->section('content')?>
</div>

</body>
</html>
