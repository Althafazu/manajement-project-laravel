<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <x-navbar/>

    {{-- script --}}
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-title">
                        <span class="card-text">Detail Master BOM & BOT</span>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nomor PP</label>
                            <p>{{ $bombot->bbt_no_pp }}</p>
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Material</label>
                            <p>{{ $bombot->bbt_nama_material }}</p>
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jumlah</label>
                            <p>{{ $bombot->bbt_jumlah }} {{ $bombot->bbt_satuan }}</p>
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jumlah Aktual</label>
                            <p>{{ $bombot->bbt_jumlah_actual }} {{ $bombot->bbt_satuan }}</p>
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Harga</label>
                            <p>Rp {{ number_format($bombot->bbt_harga, 0, ',', '.') }}</p>
                        </div>
        
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <p>{{ $bombot->bbt_status }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route( 'bombot.index') }}" class="btn btn-xl btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>