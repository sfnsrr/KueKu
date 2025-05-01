<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KueKu - Aplikasi Pengelolaan Data Kue</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #FF6B6B;
            --secondary-color: #FFD166;
            --accent-color: #4ECDC4;
            --dark-color: #5D4037;
            --light-color: #FFF0D9;
            --gradient-primary: linear-gradient(135deg, #FF6B6B, #FF8E53);
            --gradient-secondary: linear-gradient(135deg, #FFD166, #FFAB00);
            --gradient-accent: linear-gradient(135deg, #4ECDC4, #45B7AF);
            --gradient-dark: linear-gradient(135deg, #5D4037, #3E2723);
        }

        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-wrapper {
            flex: 1;
        }

        .header {
            margin-bottom: 30px;
            padding: 30px;
            background: var(--gradient-primary);
            border-radius: 15px;
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .header h1 {
            font-weight: 700;
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            box-shadow: 0 4px 10px rgba(255, 107, 107, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #FF5252, #FF7043);
        }

        .btn-secondary {
            background: var(--gradient-secondary);
            border: none;
            color: var(--dark-color);
            box-shadow: 0 4px 10px rgba(255, 209, 102, 0.3);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #FFC107, #FF9800);
            color: var(--dark-color);
        }

        .btn-warning {
            background: var(--gradient-secondary);
            border: none;
            color: var(--dark-color);
            box-shadow: 0 4px 10px rgba(255, 209, 102, 0.3);
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #FFC107, #FF9800);
            color: var(--dark-color);
        }

        .btn-danger {
            background: linear-gradient(135deg, #FF5252, #F44336);
            border: none;
            box-shadow: 0 4px 10px rgba(244, 67, 54, 0.3);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #F44336, #D32F2F);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
            overflow: hidden;
        }

        .card-body {
            padding: 25px;
        }

        .table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background: var(--gradient-dark);
            color: white;
        }

        .alert-success {
            background: var(--gradient-accent);
            color: white;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(78, 205, 196, 0.3);
        }

        footer {
            padding: 20px 0;
            color: var(--dark-color);
            text-align: center;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.25);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .cake-icon {
            margin-right: 10px;
            color: var(--secondary-color);
        }
    </style>
</head>
<body>
    <div class="container content-wrapper">
        <div class="header">
            <h1 class="text-center"><i class="fas fa-birthday-cake cake-icon"></i>KueKu</h1>
            <p class="text-center">Aplikasi Pengelolaan Data Kue yang Menggugah Selera</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <footer>
        <hr>
        <p><i class="fas fa-cookie-bite me-2"></i> &copy; {{ date('Y') }} KueKu - Membuat Catatan Kue Menjadi Lebih Manis</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
