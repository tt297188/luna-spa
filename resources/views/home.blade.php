<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luna Spa - Trang chủ</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #fffaf7;
            color: #493c36;
        }
        header {
            background: white;
            padding: 22px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            box-shadow: 0 2px 10px #ddd;
        }
        .logo {
            font-size: 30px;
            color: #a87962;
            font-weight: bold;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        nav a {
            text-decoration: none;
            color: #493c36;
            margin-left: 20px;
        }
        nav a:hover {
            color: #a87962;
        }
        .banner {
            min-height: 480px;
            background:
                linear-gradient(#0005, #0005),
                url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=1600')
                center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 30px;
        }
        .banner h1 {
            font-size: 45px;
            margin-bottom: 20px;
        }
        .banner p {
            font-size: 18px;
        }
        .btn {
            display: inline-block;
            margin: 15px 8px;
            padding: 13px 30px;
            background: #a87962;
            color: white;
            text-decoration: none;
            border-radius: 25px;
        }
        .btn:hover {
            background: #8b5e83;
        }
        .section {
            padding: 65px 8%;
            text-align: center;
        }
        .section h2 {
            color: #a87962;
            font-size: 30px;
            margin-bottom: 25px;
        }
        .section p {
            line-height: 1.8;
            max-width: 750px;
            margin: auto;
        }
        footer {
            background: #493c36;
            color: white;
            padding: 30px;
            text-align: center;
            line-height: 2;
        }
        @media (max-width: 700px) {
            header {
                flex-direction: column;
                gap: 18px;
            }
            nav {
                text-align: center;
            }
            nav a {
                display: inline-block;
                margin: 7px;
                font-size: 13px;
            }
            .banner h1 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="logo">LUNA SPA</div>
    <nav>
        <a href="{{ route('home') }}">Trang chủ</a>
        <a href="{{ route('about') }}">Giới thiệu</a>
        <a href="{{ route('services') }}">Dịch vụ</a>
        <a href="{{ route('booking') }}">Đặt lịch</a>
        <a href="{{ route('contact') }}">Liên hệ</a>
    </nav>
</header>
<section class="banner">
    <h1>Welcome to Luna Spa</h1>
    <p>Nơi thư giãn và chăm sóc vẻ đẹp của bạn</p>
    <div>
        <a href="{{ route('services') }}" class="btn">
            KHÁM PHÁ DỊCH VỤ
        </a>
        <a href="{{ route('booking') }}" class="btn">
            ĐẶT LỊCH NGAY
        </a>
    </div>
</section>
@include('partials.gallery')

<section class="section">
    <h2>Chào mừng đến với Luna Spa</h2>
    <p>
        Luna Spa mang đến những liệu trình chăm sóc sắc đẹp,
        thư giãn và phục hồi năng lượng cho bạn.
        Chúng tôi luôn mong muốn mang đến những trải nghiệm
        thoải mái và hài lòng nhất cho khách hàng.
    </p>
    <a href="{{ route('about') }}" class="btn">
        TÌM HIỂU THÊM
    </a>
</section>
<footer>
    <h2>LUNA SPA</h2>
    <p>Chăm sóc sắc đẹp - Thư giãn tâm hồn</p>
    <p>Hotline: 0378 658 828</p>
    <p>© 2026 Luna Spa. All rights reserved.</p>
</footer>
</body>
</html>