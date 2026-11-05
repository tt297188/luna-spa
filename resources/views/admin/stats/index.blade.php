<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thống kê - Luna Spa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f3f5;
            padding: 30px;
        }
        h2 {
            color: #b76e79;
        }
        .container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .card {
            background: white;
            padding: 25px;
            width: 200px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #ddd;
        }
        .card h3 {
            color: #b76e79;
        }
        .number {
            font-size: 28px;
            font-weight: bold;
        }
        a {
            color: #b76e79;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Thống kê Luna Spa</h2>
    <a href="{{ route('admin.dashboard') }}">← Quay lại trang quản trị</a>
    <div class="container">
        <div class="card">
            <h3>Tổng lịch hẹn</h3>
            <div class="number">{{ $totalBookings }}</div>
        </div>
        <div class="card">
            <h3>Đang chờ</h3>
            <div class="number">{{ $pendingBookings }}</div>
        </div>
        <div class="card">
            <h3>Đã hoàn thành</h3>
            <div class="number">{{ $completedBookings }}</div>
        </div>
        <div class="card">
            <h3>Tổng doanh thu</h3>
            <div class="number">
                {{ number_format($totalRevenue) }} đ
            </div>
        </div>
    </div>
</body>
</html>