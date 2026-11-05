<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch - Luna Spa</title>
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
            padding: 25px;
            text-align: center;
        }
        .container {
            max-width: 650px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 12px #ddd;
        }
        h2 {
            color: #a87962;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 7px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 14px;
            margin-top: 25px;
            background: #a87962;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        .errors {
            color: red;
        }
        a {
            color: #a87962;
        }
    </style>
</head>
<body>
<header>
    <h1>LUNA SPA</h1>
    <p>Đặt lịch chăm sóc sắc đẹp</p>
</header>
<div class="container">
    <h2>ĐẶT LỊCH NGAY</h2>
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <label>Họ và tên</label>
        <input type="text" name="customer_name"
               value="{{ old('customer_name') }}"
               placeholder="Nhập họ tên" required>
        <label>Số điện thoại</label>
        <input type="text" name="phone"
               value="{{ old('phone') }}"
               placeholder="Nhập số điện thoại" required>
        <label>Chọn dịch vụ</label>
        <select name="service_id" required>
            <option value="">-- Chọn dịch vụ --</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id') == $service->id ? 'selected' : '' }}>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>
        <label>Ngày đặt lịch</label>
        <input type="date" name="booking_date"
               min="{{ date('Y-m-d') }}"
               value="{{ old('booking_date') }}" required>
        <label>Giờ đặt lịch</label>
        <input type="time" name="booking_time"
               value="{{ old('booking_time') }}" required>
        <button type="submit">XÁC NHẬN ĐẶT LỊCH</button>
    </form>
    <p style="text-align:center; margin-top:25px;">
        <a href="{{ route('home') }}">← Quay về trang chủ</a>
    </p>
</div>
</body>
</html>