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
</style>
<body>
    {{-- panggil component navbar --}}
    <x-navbar />

    {{-- panggil sidebar --}}
    <x-sidebar />

    {{-- body --}}
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tambah Data Bom & BOT</h3>
                    <hr>
                </div>
                <div class="card">
                    <div class="card-body col-md-10">
                        <form action="{{ route('bombot.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="font-weight-bold">NAMA MATERIAL</label>
                                <input type="text" name="nama_material" class="form-control" required>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // message with sweet alert
        @if (session('success'))
            Swal.fire({
                title: "SUCCESS!",
                text: "{{ session('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                title: "FAILED!",
                text: "{{ session('error') }}",
                icon: "error",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>