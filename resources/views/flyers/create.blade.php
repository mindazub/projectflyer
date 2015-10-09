@extends('layouts.master')

@section('content')

<h1>Create a Flyer:</h1>

<form method="POST" action="/flyers" enctype="multipart/form-data">
	
	@include('flyers.forms.form')

	@include('errors')

</form>


@stop