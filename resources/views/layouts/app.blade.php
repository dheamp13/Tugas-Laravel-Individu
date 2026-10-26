<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Master Meja & Area - Restoran')</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 20px 40px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        h1 {
            color: #2c3e50;
            margin-top: 0;
            margin-bottom: 5px;
        }
        .subtitle {
            color: #7f8c8d;
            margin-bottom: 25px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th {
            background-color: aqua;
            color: #111;
            padding: 12px;
            font-weight: 600;
            text-align: center;
        }
        td {
            padding: 10px 14px;
            vertical-align: middle;
        }
        tr:nth-child(even) {
            background-color: #fafbfc;
        }
        tr:hover {
            background-color: #f1f7fe;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 12px;
        }
        .badge-tersedia {
            background-color: #e8f8f0;
            color: #0f9d58;
            border: 1px solid #a3e6be;
        }
        .badge-terisi {
            background-color: #fdeeed;
            color: #ea4335;
            border: 1px solid #f9b8b3;
        }
        .badge-reservasi {
            background-color: #fef7e0;
            color: #f29900;
            border: 1px solid #fae196;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: background 0.2s;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #495057;
        }
        .form-control {
            width: 100%;
            padding: 10px 14px;
            font-size: 15px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            background-color: #fff;
        }
        .form-control:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
