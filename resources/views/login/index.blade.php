<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #6c63ff);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 20px;
            overflow: hidden;
        }
        .card-header {
            border-bottom: none;
            background: linear-gradient(135deg, #0d6efd, #6c63ff);
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            border-radius: 10px;
            background: linear-gradient(135deg, #0d6efd, #6c63ff);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #5145cd);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg">
                <div class="card-header text-center text-white py-4">
                    <h3 class="mb-0">Login Karyawan</h3>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <button class="btn btn-primary w-100 py-2">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center text-muted small py-3">
                    &copy; {{ date('Y') }} Sistem Karyawan
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>