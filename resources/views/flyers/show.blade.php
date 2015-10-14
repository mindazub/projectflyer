@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-4">
		<h1>{!! $flyer->street !!}</h1>
		<h3>{!! $flyer->price !!}</h3>

		<hr/>

		<div class="description">{!! nl2br($flyer->description) !!}</div>
	</div>

	<div class="col-md-8 gallery">

		<!-- PHOTOS -->
		@if($flyer->photos->count() > 0 )
			@foreach($flyer->photos->chunk(4) as $set)
				<div class="row">
						@foreach($set as $flyerphoto)
						<div class="col-md-3 gallery__image">
							<img src="/{{ $flyerphoto->thumbnail_path }}">
							<p></p>
						</div>
						@endforeach
				</div>
			@endforeach
		@else
			@if(Auth::check())
			<p id="addingPhotosText">You can add photos to your flyers. See the box below. </p>
			@else 
			<p id="addingPhotosText"><a href="/auth/login">Login</a> to add photos to your flyers. 
			Not a member? Register <a href="/auth/register">here!</a>
			</p>
			@endif
		@endif
	</div>
	
</div>

<hr/>

			@if(Auth::check())
				<h2>
				Add your photos:
			</h2>

				
			<form id="addPhotosForm" 
			      class="dropzone"
			      method="POST"
			      action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}" 
			      >

					{{ csrf_field() }}
			</form>


			@endif

@stop

@section('scripts.footer')
	<script src="/js/dropzone.js">
	</script>

	<script type="text/javascript">
		Dropzone.options.addPhotosForm = {
			paramName: 'photo',
			maxFilesize: 8,
			acceptedFiles: '.jpg, .jpeg, .png, .bmp'
		};
	</script>
@stop