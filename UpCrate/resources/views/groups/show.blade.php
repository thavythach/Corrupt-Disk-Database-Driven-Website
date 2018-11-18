@extends('layouts.app')

@section('content')

<center>

@if(count($data['members']) > 0)

<hr>
<h1>[{{ $data['grpName'][0]->name }}] Group Members</h1>
<hr>

@foreach ($data['members'] as $member)
    <h2>{{ $member->name }}</h2>
@endforeach
@else 
    <p> no members belong to this group.</p>
@endif

</center>

@endsection 
