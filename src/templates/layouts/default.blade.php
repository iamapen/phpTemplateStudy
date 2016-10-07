<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHPテンプレートおべんきょ - Blade-5.3 @yield('title')</title>

  <link rel="stylesheet" href="/css/ress.css">
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
@yield('emptySlot')
<div class="container">
@yield(('content'))
</div>

</body>
</html>
