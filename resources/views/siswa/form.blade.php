<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Siswa</title>
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
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container">
        <h1>Form Siswa</h1>
        <form action="{{url('siswa')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" class="form-control" name="nis" value="{{old('nis')}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" value="{{old('nama_lengkap')}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
              <div class="input">
                <input type="radio" class="form-check-input" name="jenkel" value="L" @if(old('jenkel') == 'L') checked @endif >L
                <input type="radio" class="form-check-input" name="jenkel" value="P" @if(old('jenkel') == 'P') checked @endif >P
              </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Golongan Darah</label>
              <div class="input">
                <select class="form-select form-select-sm" aria-label="Small select example" name="goldar">
                  <option value="">- Pilih Goldar -</option>
                  <option value="A" @if(old('goldar') == 'A') selected @endif>A</option>
                  <option value="B" @if(old('goldar') == 'B') selected @endif>B</option>
                  <option value="AB" @if(old('goldar') == 'AB') selected @endif>AB</option>
                  <option value="O" @if(old('goldar') == 'O') selected @endif>O</option>
                </select>
              </div>
          </div>
          <div class="mb-3">
              <button class="btn custom-button" type="submit" value="Simpan">Simpan</button>
              <button class="btn btn-danger"><a href="{{url('/siswa')}}" class="text-white">Kembali</a></button>
          </div>
        </form>
    </div>
  </body>
</html>