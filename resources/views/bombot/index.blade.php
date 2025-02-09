<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Bill Of Material & Bill Of Tools</title>
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
    <div class="container-fluid mt-lg-5">
        <div class="card">
            <div class="card-header bg-primary fw-medium text-white">
                Data Bill of Material & Bill of Tools
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 d-grid gap-2">
                        <a href="{{ route('bombot.create') }}" class="btn btn-md btn-success mb-3">+ ADD MATERIAL</a>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Berdasarkan No Permintaan Pembelian atau Nama Barang...">
                    </div>
                    <div class="col-lg-4">
                        <select id="statusFilter" class="form-select">
                            <option value="">All Status</option>
                            <option value="Belum Diproses">Belum Diproses</option>
                            <option value="Sudah Dijadikan PO">Sudah Dijadikan PO</option>
                            <option value="Sudah Diterima">Sudah Diterima</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
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
                                <tr>
                                    <td colspan="9">
                                        <div class="alert alert-danger">
                                            Data Bom & BOT belum tersedia!
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // implementasi search dan filter
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const tableRows = document.querySelectorAll('.table-row');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const statusValue = statusFilter.value;

                tableRows.forEach(row => {
                    const searchableFields = row.querySelectorAll('.searchable');
                    const statusCell = row.querySelector('.status-cell');
                    const statusText = statusCell.textContent.trim();
                    
                    let matchesSearch = false;
                    searchableFields.forEach(field => {
                        if (field.textContent.toLowerCase().includes(searchTerm)) {
                            matchesSearch = true;
                        }
                    });

                    const matchesStatus = !statusValue || statusText.includes(statusValue);

                    if (matchesSearch && matchesStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterTable);
            statusFilter.addEventListener('change', filterTable);
        });

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