@extends('layouts.app')

@section('content')
<h1>Public Files @if ($data['count'] > 0) ({{ $data['count'] }}) @endif </h1>
@if(count($data['files']) > 0)
    @foreach ($data['files'] as $file)
        <div class="well">
            <h3><a href="/files/{{$file->id}}">{{$file->name}}</a></h3>
        </div>    
    @endforeach
@else 
    <p> I don't own any files. </p>
@endif
@endsection
