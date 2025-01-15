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
    {{-- <x-sidebar /> --}}

    {{-- body --}}
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h3 class="text-center my-4">Tambah Data Bom & BOT</h3>
                            <hr>
                        </div>

                        {{-- form --}}
                        <form action="{{ route('bombot.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="font-weight-bold">Nomor Permintaan Pembelian</label>
                                        <input type="text" name="bbt_no_pp" class="form-control" required placeholder="PP-001">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="font-weight-bold">Nama Material</label>
                                <input type="text" name="bbt_nama_material" class="form-control" required placeholder="Material A">
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="font-weight-bold">Jumlah</label>
                                        <input type="number" name="bbt_jumlah" class="form-control" required placeholder="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="font-weight-bold">Satuan</label>
                                        <input type="text" name="bbt_satuan" class="form-control" required placeholder="pcs / lusin / dsb.">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="font-weight-bold">Jumlah Aktual</label>
                                <input type="number" name="bbt_jumlah_actual" class="form-control" required placeholder="0">
                            </div>
                            <div class="form-group mb-3">
                                <label for="font-weight-bold">Harga</label>
                                <input type="number" name="bbt_harga" class="form-control" required placeholder="0">
                            </div>

                            {{-- button --}}
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-warning" type="reset">Batal</button>
                                <a href="{{ route('bombot.index') }}" class="btn btn-secondary" onclick="event.stopPropagation();">Back</a>
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