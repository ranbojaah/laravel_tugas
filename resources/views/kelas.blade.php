<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .container {
          border-radius:5px;
          background-color:white; 
          box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
          margin-top: 40px;
          padding: 20px;
        }
        .btn a {
        text-decoration:none;
        }
        .custom-button {
        background-color: #3498db; 
        border-color: #3498db; 
        color: #fff;
        margin-bottom:20px; 
        }

        .custom-button:hover {
        background-color: #2980b9;
        border-color: #2980b9; 
        color: #fff; 
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ session('error') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="container">
        <h1>Kelas</h1>
        <button class="btn custom-button"><a href="{{url('/kelas/create')}}" class="text-white">Tambah Data</a></button>
        <table  class="table table-striped">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Lokasi Ruangan</th>
                <th>Wali Kelas</th>
            </tr>
            <?php $i = 1; ?>
            @foreach ($kelas as $index => $row)
            <tr>
                <td>{{ $index + $kelas->firstItem() }}</td>
                <td>{{ $row->nama_kelas }}</td>
                <td>{{ $row->jurusan }}</td>
                <td>{{ $row->lokasi_ruangan }}</td>
                <td>{{ $row->nama_wali_kelas }}</td>
            </tr>
            @endforeach
        </table>
        {{ $kelas->links() }}
    </div>
</body>
</html>
