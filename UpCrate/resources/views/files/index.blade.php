@extends('layouts.app')

@section('content')
    

    <div class="container">
        <div id="content">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#red" data-toggle="tab">My Files</a></li>
                <li><a href="#orange" data-toggle="tab">Shared Files</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="red">
                    <h1>My Files @if ($data['count'] > 0) ({{ $data['count'] }}) @endif </h1>
                        @if(count($data['files']) > 0)
                            @foreach ($data['files'] as $file)
                                <div class="well">
                                    <h3><a href="/files/{{$file->id}}">{{$file->name}}</a> </h3>
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Rename</button>
                                  
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                      <div class="modal-dialog">
                                      
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Rename File</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Fill in the form with a new name to rename the file</p>
                                            <form action="/renameFile" method="POST" enctype="multipart/form-data">
                                                <label for="file">Filename:</label>
                                                <input type="text" name="new_filename" value="{{ $file->name }}">
                                                <input type="hidden" id="fileid" name="fileid" value="{{$file->id}}">
                                                <input type="submit" name="submit" value="Submit">
                                                {{ csrf_field() }}
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    </div>

                                    <a href="/files/delete/{{$file->id}}"><button>Delete</button></a>
                                    <p> Public Visibility: @if ($file->visibility == 1) On @else Off @endif </p>
                                </div>    
                            @endforeach
                        @else 
                            <p> I don't own any files. </p>
                        @endif
                </div>
                <div class="tab-pane" id="orange">
                    <h1>Shared Files @if ($data['iaCount'] > 0) ({{ $data['iaCount'] }}) @endif </h1>
                    @if(count($data['iaFiles']) > 0)
                        @foreach ($data['iaFiles'] as $file)
                            <div class="well">
                                <h3><a href="/files/{{$file->id}}">{{$file->name}}</a></h3>
                            </div>    
                        @endforeach
                    @else 
                        <p> I don't own any files. </p>
                    @endif
                </div>
            </div>
        </div>

    
@endsection 
