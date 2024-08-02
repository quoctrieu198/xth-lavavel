<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Xin chào {{$userName}}</h2>
    <p>Cảm ơn bạn đã đăng ký tài khoản của shop
    Mời bạn xác thực tài khoản để sử dụng nhiều tính năng</p>
    <button>
        <a href="http://xth-php.test/auth/verify/{{$token}}">Xác thực tài khoản </a>
    </button>
</body>
</html>
