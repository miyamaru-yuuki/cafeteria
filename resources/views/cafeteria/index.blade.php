<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>ログイン画面</title>
</head>
<body>

<h1>ログイン画面</h1>

<form action="/testaddkakunin" method="post">
    {{ csrf_field() }}
    <div>会員ID2:<input type="text" name="kid"></div>
    <input type="submit" value="ログイン">
</form>
</body>
</html>