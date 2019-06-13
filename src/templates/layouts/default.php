<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHPテンプレートおべんきょ - PurePHP <?=htmlspecialchars($title, ENT_QUOTES)?></title>

  <link rel="stylesheet" href="/css/ress.css">
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<?=$emptySlot ?? ''?>
<div class="container">
<?=$content ?? ''?>
</div>

</body>
</html>
