@extends('layouts.app')

@section('content')
    <h1>Files @if ($data['count'] > 0) ({{ $data['count'] }}) @endif </h1>
    @if(count($data['files']) > 0)
        @foreach ($data['files'] as $file)
            <div class="well">
                <h3><a href="/files/download/{{$file->id}}">{{$file->name}}</a></h3>
                <a href="/files/delete/{{$file->id}}"><button>Delete</button></a>
                <p> Public Visibility: @if ($file->visibility == 0) On @else Off @endif </p>
            </div>    
        @endforeach
    @else 
        <p> No Files Exist in the database. </p>
    @endif
@endsection 
