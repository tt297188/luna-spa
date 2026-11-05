<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý khách hàng - Luna Spa</title>
    <style>
        body {
            font-family: Arial;
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
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #b76e79;
            color: white;
        }
        a {
            color: #b76e79;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Quản lý khách hàng</h2>
    <a href="{{ route('admin.dashboard') }}">← Quay lại trang quản trị</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Ngày đăng ký</th>
        </tr>
        @forelse($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email ?? 'Chưa có' }}</td>
                <td>{{ $customer->address ?? 'Chưa có' }}</td>
                <td>{{ $customer->created_at?->format('d/m/Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Chưa có khách hàng nào.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>