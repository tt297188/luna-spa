<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa dịch vụ - Luna Spa</title>

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
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #8b5e83;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            background: #8b5e83;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
        }

        a {
            color: #8b5e83;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>SỬA DỊCH VỤ</h2>
    <a href="{{ route('admin.services.index') }}">← Quay lại danh sách</a>
    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Danh mục dịch vụ</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label>Tên dịch vụ</label>
        <input type="text" name="name"
               value="{{ old('name', $service->name) }}" required>

        <label>Mô tả</label>
        <textarea name="description" rows="4">{{ old('description', $service->description) }}</textarea>

        <label>Đường dẫn ảnh</label>
        <input type="text" name="image"
               value="{{ old('image', $service->image) }}">
        <label>Giá tiền (VNĐ)</label>
        <input type="number" name="price"
               value="{{ old('price', $service->price) }}" min="0" required>
        <label>Thời lượng (phút)</label>
        <input type="number" name="duration"
               value="{{ old('duration', $service->duration) }}" min="1" required>

        <label>
            <input type="checkbox" name="is_active" value="1"
                   style="width:auto"
                   {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                   Đang hoạt động
        </label>
        <button type="submit">Cập nhật dịch vụ</button>
    </form>
</div>
</body>
</html>