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
                                    <h3><a href="/files/{{$file->id}}">{{$file->name}}</a></h3>
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
                                <a href="/files/delete/{{$file->id}}"><button>Delete</button></a>
                                <p> Public Visibility: @if ($file->visibility == 1) On @else Off @endif </p>
                            </div>    
                        @endforeach
                    @else 
                        <p> I don't own any files. </p>
                    @endif
                </div>
            </div>
        </div>

    
@endsection 
