<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin - Luna Spa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-box {
            width: 400px;
            max-width: 92%;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px #ddd;
        }

        h1 {
            color: #a87962;
            text-align: center;
            margin-bottom: 10px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            color: #493c36;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 25px;
            background: #a87962;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #8e604c;
        }

        .error {
            color: red;
            margin-top: 15px;
            text-align: center;
        }

        .back {
            text-align: center;
            margin-top: 25px;
        }

        .back a {
            color: #a87962;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h1>LUNA SPA</h1>
    <h3>ĐĂNG NHẬP QUẢN TRỊ</h3>
    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('admin.authenticate') }}" method="POST">
        @csrf
        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Nhập email quản trị"
            required
        >
        <label>Mật khẩu</label>
        <input
            type="password"
            name="password"
            placeholder="Nhập mật khẩu"
            required
        >
        <button type="submit">
            ĐĂNG NHẬP
        </button>
    </form>
    <div class="back">
        <a href="/">← Quay lại trang chủ</a>
    </div>
</div>
</body>
</html>