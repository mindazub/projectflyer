@extends('layouts.master')

@section('content')

<h1>Create a Flyer:</h1>

<form method="PATCH" action="/flyers" enctype="multipart/form-data">
	
	{!! Form::model($flyer ,['method'=>'PATCH', 'route'=>['', $article->id]]) !!}

			@include('flyers.forms.form-edit', ['submitButtonText'=>'Update Article'])

	{!! Form::close() !!}

	

	@include('errors')

</form>


@stop