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
    <x-navbar/>

    {{-- body --}}
    <div class="container mt-5">
        @if ($projects->isEmpty())
            <span class="alert alert-danger">Tidak ada projek yang tersedia</span>
        @else
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center my-4">Data Proyek</h3>
                    <hr>
                </div>
            </div>
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('projects.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PROYEK</a>
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th scope="col">No.SPK</th>
                                <th scope="col">Nama Proyek</th>
                                <th scope="col">Jenis Proyek</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Akhir</th>
                                <th scope="col" style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"> 
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->prj_no_spk }}</td>
                                <td>{{ $project->prj_nama }}</td>
                                <td>{{ $project->prj_jenis }}</td>
                                <td>
                                    @if ($project->prj_status == 'Sedang Berlangsung')
                                        <span class="badge bg-warning text-dark">Sedang Berlangsung</span>
                                    @elseif ($project->prj_status == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif ($project->prj_status == 'Batal')
                                        <span class="badge bg-danger">Batal</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Diketahui</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($project->prj_start_date)->setTimezone('Asia/Jakarta')->translatedFormat('j F Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($project->prj_deadline)->setTimezone('Asia/Jakarta')->translatedFormat('j F Y') }}</td>
                                {{-- <td>{{ $project->prj_start_date }}</td> --}}
                                {{-- <td>{{ $project->prj_deadline }}</td> --}}
                                <td>
                                    <a href="{{ route('projects.edit', $project->prj_id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    {{-- <a href="{{ route('', $project->prj_id) }}" class="btn btn-sm btn-primary">OPEN</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>