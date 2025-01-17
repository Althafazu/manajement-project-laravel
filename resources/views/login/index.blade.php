<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    . {
        font-family: Barlow;
        font-weight: bold;
    }
    body {
        background-image: url('{{ asset('assets/images/IMG_Background.jpg') }}'); 
        background-repeat: no-repeat; 
        background-size: cover;
    }
</style>
<body>
    {{-- panggil component navbar --}}
    <x-navbar />

    {{-- body --}}
    <div class="container mt-5">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Login </h4>
                        <hr>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="usr_id" class="form-label"> Username <span class="text-danger">*</span> </label>
                                <input type="text" name="usr_id" id="usr_id" class="form-control" aria-describedby="usr_id-help" autofocus placeholder="Username">
                                @error('usr_id')
                                    <span id="usr_id-help" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span> </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                @error('password')
                                    <span id="password-help" class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="mb-3 btn btn-success w-100"> Login </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>