@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-3">
		<h1>{!! $flyer->street !!}</h1>
		<h3>{!! $flyer->price !!}</h3>

		<hr/>

		<div class="description">{!! nl2br($flyer->description) !!}</div>
	</div>

	<div class="col-md-9">
	<!-- PHOTOS -->
	</div>
	
</div>

<hr/>

<h2>
	Add your photos:
</h2>

	
<form id="addPhotosForm" 
      class="dropzone"
      method="POST"
      action="#" 
      >

		{{ csrf_field() }}
</form>

@stop

@section('scripts.footer')
	<script src="/js/dropzone.js">
	</script>

	<script type="text/javascript">
		Dropzone.options.addPhotosForm = {
			paramName: 'photo',
			maxFilesize: 5,
			acceptedFiles: '.jpg, .jpeg, .png, .bmp'
		};
	</script>
@stop