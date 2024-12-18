<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <span class="navbar-text text-primary">Sistem Manajemen Project</span>
        </div>
    </nav>

    {{-- body --}}
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Login</div>
                    <form method="POST" action="/login">
                        @csrf
                        <div class="mt-3">
                            <label for="username">Username</label>
                            <input type="number" name="username" id="username" aria-describedby="username-help" autofocus required>
                            <div id="username-help" class="form-text">Masukkan NIM atau NPK di sini...</div>
                        </div>
                        <div class="mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="mt-3 btn btn-success"> Login </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>