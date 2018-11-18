@extends('layouts.app')

@section('content')

<center>
<hr>
<h1>[{{ $data['grpName'][0]->name }}] Group</h1>
<hr>
</center>
<div class="container">
        <div id="content">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#red" data-toggle="tab">Group Members</a></li>
                <li><a href="#orange" data-toggle="tab">Group Files</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="red">
                        <center>

                                @if(count($data['members']) > 0)

                                <br>
                                
                                @foreach ($data['members'] as $member)
                                    <p>{{ $member->name }}</p>
                                @endforeach
                                @else 
                                    <p> no members belong to this group.</p>
                                @endif
                                
                        </center>
                                
                </div>
                <div class="tab-pane" id="orange">
                        <center>

                                @if(count($data['files']) > 0)

                                <br>
                                
                                @foreach ($data['files'] as $file)
                                    <p><a href="/groupFile/{{$file->file_id}}">{{ $file->name }}</a></p>
                                @endforeach
                                @else 
                                    <p> no group files belong to this group.</p>
                                @endif
                                
                        </center>
                </div>
            </div>
        </div>

@endsection 
