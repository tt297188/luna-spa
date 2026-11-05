<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa danh mục - Luna Spa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h2 {
            color: #8b5e83;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background: #8b5e83;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back {
            color: #8b5e83;
            text-decoration: none;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>SỬA DANH MỤC</h2>
    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Tên danh mục</label>
        <input type="text"
               name="name"
               value="{{ old('name', $category->name) }}"
               required>

        <label>Mô tả</label>
        <textarea name="description"
                  rows="4">{{ old('description', $category->description) }}</textarea>

        <label>
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                   style="width:auto;">
            Đang hoạt động
        </label>
        <button type="submit">CẬP NHẬT</button>
    </form>
    <br>
    <a href="{{ route('admin.categories.index') }}" class="back">
        ← Quay lại danh sách
    </a>
</div>
</body>
</html>
