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
        .service-reviews {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .service-reviews h4 {
            color: #8b5e83;
            margin-bottom: 10px;
        }

        .average-rating {
            color: #b8860b;
            font-weight: bold;
        }

        .review-item {
            background: #fff8fc;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            text-align: left;
        }

        .stars {
            color: #d6a33f;
            margin: 0 0 5px;
        }

        .review-item p {
            margin: 5px 0;
        }

        .review-item small {
            color: #888;
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
                <div class="service-reviews">
    <h4>Đánh giá khách hàng</h4>

    @if($service->reviews->count() > 0)

        @php
            $averageRating = $service->reviews->avg('rating');
        @endphp

        <p class="average-rating">
            ⭐ {{ number_format($averageRating, 1) }}/5
            ({{ $service->reviews->count() }} đánh giá)
        </p>

        @foreach($service->reviews->take(2) as $review)
            <div class="review-item">
                <p class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        {{ $i <= $review->rating ? '★' : '☆' }}
                    @endfor
                </p>

                <p>{{ $review->comment }}</p>

                <small>
                    {{ $review->booking->customer->name ?? 'Khách hàng' }}
                </small>
            </div>
        @endforeach

    @else
        <p>Chưa có đánh giá nào.</p>
    @endif
</div>
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