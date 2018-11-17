@extends('layouts.app')

@section('content')
  <script>
    function yesnoCheck() {
      if (document.getElementById('privateVis').checked) {
          document.getElementById('userSelect').style.visibility = 'visible';
      }
      else document.getElementById('userSelect').style.visibility = 'hidden';
    }
  </script>
  <h1 class="cover-heading">Get started.</h1>
  <p class="lead">Upload a file and get started storing with UpCrate.</p>

  <form action="/process" enctype="multipart/form-data" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="file">Select a file</label>
        <input type="file" class="form-control-file" name="file" id="file">
      </div>
      <div class="form-group col-md-6">
        <label for="visibility">Visibility</label><br>
        <input onclick="javascript:yesnoCheck();" class="form-check-input" type="radio" name="visibility" id="privateVis" value="Private">
        <label class="form-check-label" for="privateVis">Private</label>
        <br>
        <input onclick="javascript:yesnoCheck();"class="form-check-input" type="radio" name="visibility" id="publicVis" value="Public" checked>
        <label class="form-check-label" for="publicVis">Public</label>
      </div>
    <div id="userSelect" style="visibility:hidden">
      <div class="form-group col-md-4">
        <label for="userSelect">Select users that can access: </label>

          {!! Form::Label('item', 'Item:') !!}
          <select multiple class="form-control" name="item_id[]">
            @foreach($users as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group col-md-2"></div>
    </div>
    <button class="btn btn-primary btn-lg">Upload</button>
    {{ csrf_field() }}
  </form>

  <br><br><br>
  <center><footer class="row">
    @include('includes.footer')
  </footer></center>
  </div>
@endsection
