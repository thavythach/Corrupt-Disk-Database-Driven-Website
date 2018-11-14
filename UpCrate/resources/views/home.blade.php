@extends('layouts.app')

@section('content')
<body class="text-center">

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Get started.</h1>
        <p class="lead">Upload a file and get started storing with UpCrate.</p>
        <p class="lead">
          <form action="/process" enctype="multipart/form-data" method="POST">
            <p>
                <label for="file">
                    <input type="file" name="file" id="file"><br>
                    <input type="radio" name="visibility" value="Private" checked> Private
                    <input type="radio" name="visibility" value="Public">Public<br>
                </label>
            </p>
            <button>Upload</button>
          {{ csrf_field() }}
        </form>
        </p>
      </main>

      <footer class="row">
        @include('includes.footer')
      </footer>
    </div>
@endsection
