<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đánh giá - Luna Spa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf7;
            color: #493c36;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #ddd;
        }

        h1 {
            color: #a87962;
            text-align: center;
        }

        .back {
            color: #a87962;
            text-decoration: none;
        }

        .message {
            color: green;
            margin: 15px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            padding: 13px;
            border: 1px solid #eee;
            text-align: center;
        }

        th {
            background: #a87962;
            color: white;
        }

        .stars {
            color: #d6a33f;
            font-weight: bold;
        }

        .approved {
            color: green;
            font-weight: bold;
        }

        .hidden {
            color: red;
            font-weight: bold;
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 3px;
            color: white;
        }

        .status-btn {
            background: #a87962;
        }

        .delete-btn {
            background: #c0392b;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #888;
        }

        @media(max-width: 700px) {
            body {
                padding: 10px;
            }

            .container {
                padding: 12px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>QUẢN LÝ ĐÁNH GIÁ</h1>

    <p>
        <a class="back" href="{{ route('admin.dashboard') }}">
            ← Quay lại trang quản trị
        </a>
    </p>

    @if(session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    @if($reviews->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Khách hàng</th>
                    <th>Dịch vụ</th>
                    <th>Đánh giá</th>
                    <th>Nhận xét</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $review->booking->customer->name ?? 'Không rõ' }}
                        </td>

                        <td>
                            {{ $review->booking->service->name ?? 'Không rõ' }}
                        </td>

                        <td class="stars">
                            {{ $review->rating }}/5 ★
                        </td>

                        <td>
                            {{ $review->comment }}
                        </td>

                        <td>
                            @if($review->status == 'approved')
                                <span class="approved">Đang hiển thị</span>
                            @else
                                <span class="hidden">Đang ẩn</span>
                            @endif
                        </td>

                        <td>
                            <form
                                action="{{ route('admin.reviews.status', $review->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                @if($review->status == 'approved')
                                    <input type="hidden" name="status" value="hidden">
                                    <button type="submit" class="status-btn">
                                        Ẩn
                                    </button>
                                @else
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="status-btn">
                                        Hiển thị
                                    </button>
                                @endif
                            </form>

                            <form
                                action="{{ route('admin.reviews.destroy', $review->id) }}"
                                method="POST"
                                onsubmit="return confirm('Bạn có chắc muốn xóa đánh giá này?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <div class="empty">
            <h3>Chưa có đánh giá nào!</h3>
            <p>Đánh giá của khách hàng sẽ xuất hiện tại đây.</p>
        </div>
    @endif

</div>

</body>
</html>