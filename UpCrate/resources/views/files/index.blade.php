@extends('layouts.app')

@section('content')
    <h1>Files</h1>
    @if(count($files) > 0)
        @foreach ($files as $file)
            <div class="well">
                <h3><a href="/files/download/{{$file->id}}">{{$file->name}}</a></h3>
                <a href="/files/delete/{{$file->id}}"><button>Delete</button></a>
            </div>    
        @endforeach
    @else 
        <p> No Files Exist in the database. </p>
    @endif
@endsection 
