<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu lịch hẹn - Luna Spa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fffaf7;
            color: #493c36;
            padding: 30px 15px;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #ddd;
        }

        h1 {
            text-align: center;
            color: #a87962;
        }

        input {
            width: 100%;
            padding: 13px;
            margin: 15px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #a87962;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .booking {
            background: #fffaf7;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }

        a {
            color: #a87962;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>LUNA SPA</h1>
    <h2>Tra cứu lịch hẹn</h2>

    <form action="{{ route('booking.search') }}" method="POST">
        @csrf

        <label>Nhập số điện thoại</label>
        <input
            type="text"
            name="phone"
            value="{{ old('phone') }}"
            placeholder="Nhập số điện thoại đã đặt lịch"
            required
        >
        @error('phone')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <button type="submit">TRA CỨU LỊCH HẸN</button>
    </form>
    @isset($bookings)
        @if($bookings->count() > 0)
            <h3>Kết quả tra cứu</h3>

            @foreach($bookings as $booking)

                <div class="booking">
                    <p><strong>Khách hàng:</strong>
                        {{ $booking->customer->name }}
                    </p>
                    <p><strong>Dịch vụ:</strong>
                        {{ $booking->service->name }}
                    </p>
                    <p><strong>Ngày đặt:</strong>
                        {{ $booking->booking_date }}
                    </p>
                    <p><strong>Giờ đặt:</strong>
                        {{ $booking->booking_time }}
                    </p>
                    <p><strong>Trạng thái:</strong>
                        {{ $booking->status }}
                    </p>
                </div>
            @endforeach

        @else
            <p style="color:red; margin-top:20px;">
                Không tìm thấy lịch hẹn với số điện thoại này.
            </p>
        @endif
    @endisset
    <p style="text-align:center; margin-top:25px;">
        <a href="/">← Quay lại trang chủ</a>
    </p>
</div>
</body>
</html>