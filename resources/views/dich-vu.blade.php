<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dịch vụ - Luna Spa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #fff8fc;
            color: #444;
        }
        header {
            background: #8b5e83;
            color: white;
            padding: 25px;
            text-align: center;
        }
        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 20px;
        }
        h2 {
            color: #8b5e83;
            text-align: center;
        }
        .services {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .service {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #ddd;
        }
        .service img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }
        .price {
            color: #8b5e83;
            font-weight: bold;
        }
        a {
            color: #8b5e83;
        }
        @media (max-width: 700px) {
            .services {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>LUNA SPA</h1>
    <p>Chăm sóc sắc đẹp - Thư giãn tâm hồn</p>
</header>
<div class="container">
    <h2>DỊCH VỤ CỦA CHÚNG TÔI</h2>
    <div class="services">
        @forelse($services as $service)
            <div class="service">
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}"
                         alt="{{ $service->name }}">
                @endif
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>
                <p class="price">
                    Giá: {{ number_format($service->price) }} VNĐ
                </p>
                <p>Thời lượng: {{ $service->duration }} phút</p>
                @if($service->category)
                    <p>Danh mục: {{ $service->category->name }}</p>
                @endif
                <a href="{{ route('booking') }}">Đặt lịch ngay</a>
            </div>
        @empty
            <p>Hiện chưa có dịch vụ nào.</p>
        @endforelse
    </div>
    <p style="text-align:center; margin-top:30px;">
        <a href="{{ route('home') }}">← Quay về trang chủ</a>
    </p>
</div>
</body>
</html>