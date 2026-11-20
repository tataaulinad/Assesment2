<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - FoodShare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" 
rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex flex-column justify-content-center py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-7 col-lg-5">
                <div class="text-center mb-4">
                    <h3 class="fw-semibold text-primary mb-0"><i class="bi bi-building-gear me-1">
</i> FoodShare</h3>
                    <p class="text-muted small mb-0">Sistem untuk mengelola katalog donasi dan pengajuan bantuan secara tertib</p>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                         @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
