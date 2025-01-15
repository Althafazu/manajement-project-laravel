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

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <h3 class="text-center my-4">Edit Data BOM & BOT</h3>
                            <hr>
                        </div>
                        {{-- form --}}
                        <form action="{{ route('bombot.update', $bombot->bbt_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="bbt_no_pp" class="font-weight-bold">Nomor Permintaan Pembelian</label>
                                        <input type="text" class="form-control @error('bbt_no_pp') is-invalid @enderror" name="bbt_no_pp" value="{{ old('bbt_no_pp', $bombot->bbt_no_pp) }}" placeholder="PP-001" readonly>
                                        @error('bbt_no_pp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="bbt_nama_material" class="font-weight-bold">Nama Material</label>
                                        <input type="text" name="bbt_nama_material" class="form-control @error('bbt_nama_material') is-invalid @enderror" required placeholder="Material A" value="{{ old('bbt_nama_material', $bombot->bbt_nama_material) }}">
                                        @error('bbt_nama_material')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="bbt_jumlah" class="font-weight-bold">Jumlah</label>
                                        <input type="number" name="bbt_jumlah" class="form-control @error('bbt_jumlah') is-invalid @enderror" required placeholder="0" value="{{ old('bbt_jumlah', $bombot->bbt_jumlah) }}">
                                        @error('bbt_jumlah')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="bbt_satuan" class="font-weight-bold">Satuan</label>
                                        <input type="text" name="bbt_satuan" class="form-control @error('bbt_satuan') is-invalid @enderror" required placeholder="pcs / lusin / dsb." value="{{ old('bbt_satuan', $bombot->bbt_satuan) }}">
                                        @error('bbt_satuan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="bbt_harga" class="font-weight-bold">Harga</label>
                                        <input type="number" name="bbt_harga" class="form-control @error('bbt_harga') is-invalid @enderror" required placeholder="0" value="{{ old('bbt_harga', $bombot->bbt_harga) }}">
                                        @error('bbt_harga')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="bbt_jumlah_actual" class="font-weight-bold">Jumlah Aktual</label>
                                        <input type="number" name="bbt_jumlah_actual" class="form-control @error('bbt_jumlah_actual') is-invalid @enderror" required placeholder="0" value="{{ old('bbt_jumlah_actual', $bombot->bbt_jumlah_actual) }}">
                                        @error('bbt_jumlah_actual')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
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
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html> 