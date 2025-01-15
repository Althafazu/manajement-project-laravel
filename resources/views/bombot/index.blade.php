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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Bom & BOT</h3>
                    <hr>
                </div>
                <div class="card border-1 shadow-sm rounded p-3">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Permintaan Pembelian</th>
                                <th scope="col">Nama Material</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Jumlah Aktual</th>
                                <th scope="col">Harga Aktual</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($bombot as $bbt)
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>{{ $bbt->bbt_no_pp }}</td>
                                    <td>{{ $bbt->bbt_nama_material }}</td>
                                    <td>{{ $bbt->bbt_jumlah }}</td>
                                    <td>{{ $bbt->bbt_satuan }}</td>
                                    <td>{{ $bbt->bbt_jumlah_actual }}</td>
                                    {{-- perhitungan harga * jumlah aktual --}}
                                    <td>{{ "Rp." . number_format($bbt->bbt_jumlah_actual * $bbt->bbt_harga, 2, ',', '.') }}</td>
                                    
                                    <td class="text-center">
                                        @if ($bbt->bbt_status == 'Belum Diproses')
                                            <span class="badge text-bg-secondary">Belum Diproses</span>
                                        @elseif ($bbt->bbt_status == 'Sudah Dijadikan PO')
                                            <span class="badge text-bg-warning">Sudah Dijadikan PO</span>
                                        @elseif ($bbt->bbt_status == 'Sudah Diterima')
                                            <span class="badge text-bg-success">Sudah Diterima</span>
                                        @endif
                                    </td>
                                    {{-- action --}}
                                    <td>
                                        <form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('bombot.destroy', $bbt->bbt_id) }}" method="POST">
                                            <div class="d-grid gap-2">
                                                {{-- <a href="{{ route('bombot.show', $bbt->bbt_id) }}" class="btn btn-sm btn-dark" onclick="event.stopPropagation();">SHOW</a>  --}}
                                                <a href="{{ route('bombot.edit', $bbt->bbt_id) }}" class="btn btn-sm btn-primary" onclick="event.stopPropagation();">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                            </form> 
                                        </div>
                                    </td>
                                    <?php $no++; ?>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Bom & BOT belum tersedia!
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('bombot.create') }}" class="btn btn-md btn-success mb-3">ADD MATERIAL</a>
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