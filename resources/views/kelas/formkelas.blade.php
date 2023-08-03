<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      .container {
        border-radius:5px;
        background-color:white; 
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        margin-top: 40px;
        padding: 20px;
        width: 30%;
      }
      .input{
        display: flex;
        align-items: center;
        gap: 1rem;
      }
      .custom-button {
      background-color: #3498db; 
      border-color: #3498db; 
      color: #fff;
      }

      .custom-button:hover {
        background-color: #2980b9;
        border-color: #2980b9; 
        color: #fff; 
      }
      .btn a {
        text-decoration:none;
      }
    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    @if(session('error'))
    <div class="alert alert-error ">
      {{ session('error') }}
    </div>
    @endif 

    @if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show ">

      <strong>Perhatian</strong>
      <br/>
      <ul>
        @foreach($errors->all() as $error)
            @if($error == "The jurusan field is required.")
                <li>Jurusan tidak boleh kosong</li>
            @elseif(strpos($error, 'has already been taken.') !== false)
                <li>{{ str_replace(['The', 'field', 'has already been taken.'], ['', '', 'sudah ada'], $error) }}</li>
            @else
                <li>{{ str_replace(['The', 'field', 'is', 'required.'], ['', '', 'tidak boleh kosong', ''], $error) }}</li>
            @endif
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container">
        <h1>Form Kelas</h1>
        <form action="{{url('kelas')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama Kelas</label>
              <input type="text" class="form-control" name="nama_kelas" value="{{old('nama_kelas')}}">
            </div>
            <div class="mb-3">
              <label class="form-label">Jurusan</label>
                <div class="input">
                  <select class="form-select form-select-sm" aria-label="Small select example" name="jurusan">
                      <option value="">- Pilih Jurusan -</option>
                      <option value="Teknik Audio Vidio" @if(old('jurusan') == 'Teknik Audio Vidio') selected @endif>Teknik Audio Vidio</option>
                      <option value="Teknik Otomasi Industri" @if(old('jurusan') == 'Teknik Otomasi Industri') selected @endif>Teknik Otomasi Industri</option>
                      <option value="Teknik Instalasi Listrik" @if(old('jurusan') == 'Teknik Instalasi Listrik') selected @endif>Teknik Instalasi Listrik</option>
                      <option value="Teknik Komputer Jaringan" @if(old('jurusan') == 'Teknik Komputer Jaringan') selected @endif>Teknik Komputer Jaringan</option>
                      <option value="Rekayasa Perangkat Lunak" @if(old('jurusan') == 'Rekayasa Perangkat Lunak') selected @endif>Rekayasa Perangkat Lunak</option>
                      <option value="Desain Komunikasi Visual" @if(old('jurusan') == 'Desain Komunikasi Visual') selected @endif>Desain Komunikasi Visual</option>
                  </select>
                </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Lokasi Ruangan</label>
              <input type="text" class="form-control" name="lokasi_ruangan" value="{{old('lokasi_ruangan')}}">
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Wali Kelas</label>
              <input type="text" class="form-control" name="nama_wali_kelas" value="{{old('nama_wali_kelas')}}">
            </div>
            <div class="mb-3">
              <button class="btn custom-button" type="submit" value="Simpan">Simpan</button>
              <button class="btn btn-danger"><a href="{{url('/kelas')}}" class="text-white">Kembali</a></button>
           </div>
        </form>
    </div>
  </body>
</html>