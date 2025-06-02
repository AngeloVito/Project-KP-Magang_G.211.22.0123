<!DOCTYPE html>
<html>
    <head>
        <title>Upload Berkas</title>
        <link href="upload.css" rel="stylesheet">
    </head>
    <body>
        <div class="sidebar">
            <h4 class="p-3">Menu</h4>
            <a href="{{ route('index') }}">Profil Anda</a>
            <a href="{{ route('edit') }}">Edit Profil</a>
            <a href="{{ route('upload') }}">Upload Berkas</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>

        <div class="content">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <h2>Upload Berkas (PDF maks. 20MB)</h2>

            <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file_pdf">Pilih file PDF:</label>
                    <input type="file" name="file_pdf" accept="application/pdf" required>
                </div>
                <button type="submit">Upload</button>
            </form>

            <hr>

            <h3>File yang telah diupload:</h3>
            <ul>
            @foreach ($uploadedFiles as $file)
                <li>
                    <a href="{{ Storage::url($file) }}" target="_blank">{{ basename($file) }}</a>
                    <form action="{{ route('upload.delete', basename($file)) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </li>
            @endforeach
        </div>
    </body>
</html>