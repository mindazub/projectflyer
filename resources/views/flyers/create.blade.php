@extends('layouts.master')

@section('content')

<h1>Create a Flyer:</h1>

<form>
	
	@include('flyers.forms.form')

	@if(count($errors) > 0)
	            <div class="alert alert-danger">
	                <ul>
	                @foreach($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	                </ul>
	            </div>
	@endif

</form>


@stop