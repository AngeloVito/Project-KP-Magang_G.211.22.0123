<!DOCTYPE html>
<html>
    <head>
        <title>Profil Karyawan</title>
        <link href="edit.css" rel="stylesheet">
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
            <h2>Edit Profil</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('update') }}" method="POST" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $auth->nama_lengkap) }}" required maxlength="100" />
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $auth->nip) }}" required maxlength="20" />
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ old('jabatan', $auth->jabatan) }}" required maxlength="50" />
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $auth->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $auth->no_hp) }}" required maxlength="12" />
                </div>

                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $auth->tanggal_masuk) }}" required />
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
        </div>
    </body>
</html>