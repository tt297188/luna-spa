<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục - Luna Spa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
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
            border: none;
            background: none;
            cursor: pointer;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<div class="container">

    <h2>QUẢN LÝ DANH MỤC LUNA SPA</h2>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.categories.create') }}" class="add-btn">
        + Thêm danh mục
    </a>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Slug</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        {{ $category->is_active ? 'Đang hoạt động' : 'Ngừng hoạt động' }}
                    </td>
                    <td>
                        <a class="edit"
                           href="{{ route('admin.categories.edit', $category->id) }}">
                            Sửa
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
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
                    <td colspan="6">Chưa có danh mục nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
</body>
</html>