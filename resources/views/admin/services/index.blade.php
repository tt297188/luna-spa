<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý dịch vụ - Luna Spa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #8b5e83;
        }

        .add-btn {
            display: inline-block;
            background: #8b5e83;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1e6ef;
        }

        .edit {
            color: blue;
        }

        .delete {
            color: red;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>QUẢN LÝ DỊCH VỤ LUNA SPA</h2>
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    <a href="{{ route('admin.services.create') }}" class="add-btn">
        + Thêm dịch vụ
    </a>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên dịch vụ</th>
                <th>Danh mục</th>
                <th>Giá tiền</th>
                <th>Thời lượng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category->name ?? 'Chưa có' }}</td>
                    <td>{{ number_format($service->price) }} VNĐ</td>
                    <td>{{ $service->duration }} phút</td>
                    <td>
                        {{ $service->is_active ? 'Đang hoạt động' : 'Ngừng hoạt động' }}
                    </td>
                    <td>
                        <a class="edit"
                           href="{{ route('admin.services.edit', $service->id) }}">
                            Sửa
                        </a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Bạn có chắc muốn xóa dịch vụ này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Chưa có dịch vụ nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>