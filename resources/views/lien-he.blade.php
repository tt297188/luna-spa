<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - Luna Spa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #fffaf7;
            color: #493c36;
        }
        header {
            background: #a87962;
            color: white;
            text-align: center;
            padding: 25px;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 25px;
        }
        h2 {
            color: #a87962;
            text-align: center;
            margin-bottom: 30px;
        }
        .contact-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #ddd;
            line-height: 2;
        }
        .contact-box h3 {
            color: #a87962;
        }
        .contact-box p {
            margin: 12px 0;
        }
        a {
            color: #a87962;
        }
        .back {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<header>
    <h1>LUNA SPA</h1>
    <p>Chăm sóc sắc đẹp - Thư giãn tâm hồn</p>
</header>
<div class="container">
    <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
    <div class="contact-box">
        <h3>Thông tin Luna Spa</h3>
        <p><strong>Địa chỉ:</strong>Trâu quỳ , Gia Lâm, Hà Nội</p>
        <p><strong>Hotline:</strong> 0378 658 828 </p>
        <p><strong>Email:</strong> lunaspa@gmail.com</p>
        <p><strong>Giờ hoạt động:</strong> 08:00 - 21:00 (Thứ 2 - Chủ nhật)</p>
        <h3>Chúng tôi luôn sẵn sàng hỗ trợ bạn!</h3>
        <p>
            Nếu bạn có thắc mắc về dịch vụ hoặc muốn được tư vấn,
            hãy liên hệ với Luna Spa qua số điện thoại trên.
        </p>
    </div>
    <div class="back">
        <a href="{{ route('home') }}">← Quay về trang chủ</a>
    </div>
</div>
</body>
</html>