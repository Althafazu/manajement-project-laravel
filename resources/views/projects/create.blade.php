<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    @include('components.navbar')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="prj_no_spk" class="form-label">No. SPK</label>
                                <input type="text" id="prj_no_spk" class="form-control @error('prj_no_spk') is-invalid @enderror" name="prj_no_spk" value="{{ old('prj_no_spk') }}" placeholder="Masukkan Nomor SPK">
                                @error('prj_no_spk')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="prj_nama" class="form-label">Nama Proyek</label>
                                <input type="text" id="prj_nama" class="form-control @error('prj_nama') is-invalid @enderror" name="prj_nama" value="{{ old('prj_nama') }}" placeholder="Masukkan Nama Proyek">
                                @error('prj_nama')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="prj_jenis" class="form-label">Jenis Proyek</label>
                                <select id="prj_jenis" class="form-select @error('prj_jenis') is-invalid @enderror" name="prj_jenis">
                                    <option value="" selected disabled>Pilih Jenis Proyek</option>
                                    <option value="Internal" {{ old('prj_jenis') == 'Internal' ? 'selected' : '' }}>Internal</option>
                                    <option value="Eksternal" {{ old('prj_jenis') == 'Eksternal' ? 'selected' : '' }}>Eksternal</option>
                                </select>
                                @error('prj_jenis')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="prj_status" class="form-label">Status</label>
                                <select id="prj_status" class="form-select @error('prj_status') is-invalid @enderror" name="prj_status">
                                    <option value="" selected disabled>Pilih Status Proyek</option>
                                    <option value="Sedang Berlangsung" {{ old('prj_status') == 'Sedang Berlangsung' ? 'selected' : '' }}>Sedang Berlangsung</option>
                                    <option value="Selesai" {{ old('prj_status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Batal" {{ old('prj_status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                @error('prj_status')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="prj_start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" id="prj_start_date" class="form-control @error('prj_start_date') is-invalid @enderror" name="prj_start_date" value="{{ old('prj_start_date') }}">
                                @error('prj_start_date')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="prj_deadline" class="form-label">Tanggal Akhir</label>
                                <input type="date" id="prj_deadline" class="form-control @error('prj_deadline') is-invalid @enderror" name="prj_deadline" value="{{ old('prj_deadline') }}">
                                @error('prj_deadline')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning">Batal</button>
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>