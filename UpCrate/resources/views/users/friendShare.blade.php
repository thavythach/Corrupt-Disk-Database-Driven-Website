@extends('layouts.app')

@section('content')

<center>
<p>Fill in the form with an email.</p>
<form action="/friendShare/process" method="POST" enctype="multipart/form-data">
    <label for="file">Friend's Email:</label>
    <input type="text" name="email" value="">
    <input type="submit" name="submit" value="Submit">
    {{ csrf_field() }}
</form>
</center>
@endsection