<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý lịch hẹn - Luna Spa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f3f5;
            padding: 30px;
        }
        h2 {
            color: #b76e79;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #b76e79;
            color: white;
        }
        select, button {
            padding: 7px;
        }
        button {
            background: #b76e79;
            color: white;
            border: none;
            cursor: pointer;
        }
        a {
            color: #b76e79;
            text-decoration: none;
        }
        .success {
            color: green;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>Quản lý lịch hẹn</h2>
    <a href="{{ route('admin.dashboard') }}">← Quay lại trang quản trị</a>
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    <table>
        <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Số điện thoại</th>
            <th>Dịch vụ</th>
            <th>Ngày đặt</th>
            <th>Giờ đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Cập nhật</th>
        </tr>
        @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->customer->name ?? 'Không có' }}</td>
                <td>{{ $booking->customer->phone ?? 'Không có' }}</td>
                <td>{{ $booking->service->name ?? 'Không có' }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->booking_time }}</td>
                <td>{{ number_format($booking->total_price ?? 0) }} đ</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <form action="{{ route('admin.bookings.status', $booking->id) }}"
                          method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status">
                            <option value="pending"
                                {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                Chờ xác nhận
                            </option>
                            <option value="confirmed"
                                {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                Đã xác nhận
                            </option>
                            <option value="completed"
                            {{ $booking->status == 'completed' ? 'selected' : '' }}>
                                Hoàn thành
                            </option>
                            <option value="cancelled"
                                {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                Đã hủy
                            </option>
                        </select>
                        <button type="submit">Lưu</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">Chưa có lịch hẹn nào.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>