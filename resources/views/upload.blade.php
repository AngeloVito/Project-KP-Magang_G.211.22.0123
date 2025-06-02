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

            <div class="card card-danger">
                <div class="card-header">
                    <div class="card-title">Upload File</div>
                </div>
            </div>

        </div>
    </body>
</html>