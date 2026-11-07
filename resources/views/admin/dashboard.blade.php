<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị Luna Spa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf7;
            margin: 0;
            color: #493c36;
        }

        header {
            background: #a87962;
            color: white;
            padding: 25px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        main {
            padding: 40px 8%;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #ddd;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .menu a {
            display: block;
            background: #f8eee9;
            padding: 25px;
            text-align: center;
            text-decoration: none;
            color: #8b5e83;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .menu a:hover {
            background: #a87962;
            color: white;
        }

        button {
            background: #493c36;
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        @media(max-width: 600px) {
            header {
                padding: 20px;
            }

            main {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<header>
    <h2>LUNA SPA - ADMIN</h2>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
</header>
<main>
    <div class="card">

        <h1>Xin chào, {{ $admin->name }}!</h1>
        <p>Chào mừng bạn đến với hệ thống quản trị Luna Spa.</p>
        <h3>CHỨC NĂNG QUẢN LÝ</h3>

        <div class="menu">

            <a href="{{ route('admin.services.index') }}">
                Quản lý dịch vụ
            </a>

            <a href="{{ route('admin.categories.index') }}">
                Quản lý danh mục
            </a>

            <a href="{{ route('admin.customers.index') }}">
                Quản lý khách hàng
             </a>
            <a href="{{ route('admin.bookings.index') }}">
                Quản lý lịch hẹn
            </a>
            <a href="{{ route('admin.stats.index') }}">
                Thống kê doanh thu
            </a>
            <a href="{{ route('admin.reviews.index') }}">
                Quản lý đánh giá
            </a>

        </div>
    </div>
</main>
</body>
</html>