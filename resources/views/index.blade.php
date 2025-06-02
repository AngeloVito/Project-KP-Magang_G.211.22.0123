<!DOCTYPE html>
<html>
    <head>
        <title>Profil Karyawan</title>
        <link href="index.css" rel="stylesheet">
    </head>
    <body>
        <div class="sidebar">
            <h4 class="p-3">Menu</h4>
            <a href="{{ route('index', $auth) }}">Profil Anda</a>
            <a href="{{ route('edit', $auth) }}">Edit Profil</a>
            <a href="{{ route('upload', $auth) }}">Upload Berkas</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>

        <div class="content">
            <h2>Data Profil Karyawan</h2>
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nama Lengkap</dt>
                    <dd class="col-sm-9">{{ $auth->nama_lengkap }}</dd>

                    <dt class="col-sm-3">NIP</dt>
                    <dd class="col-sm-9">{{ $auth->nip }}</dd>

                    <dt class="col-sm-3">Jabatan</dt>
                    <dd class="col-sm-9">{{ $auth->jabatan }}</dd>

                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">{{ $auth->alamat ?? '-' }}</dd>

                    <dt class="col-sm-3">No Handphone</dt>
                    <dd class="col-sm-9">{{ $auth->no_hp ?? '-' }}</dd>

                    <dt class="col-sm-3">Tanggal Masuk</dt>
                    <dd class="col-sm-9">{{ $auth->tanggal_masuk }}</dd>
                </dl>
            </div>
        </div>
    </body>
</html>