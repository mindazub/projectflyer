@extends('layouts.master')

@section('content')

<div class="row">
	
	<h1>Flyers:</h1>


	<table class="table table-striped table-bordered">
			<thead>
				<th>id</th>
				<th>Zip</th>
				<th>Street</th>
				<th>Photo</th>
				<th>Remove</th>
			</thead>

			<tbody>
			@foreach($flyers->all() as $flyer )
			<tr> 
				<td>***</td>
				<td><a href="{{ route('show_flyer', [$flyer->zip, $flyer->street]) }}">{{ $flyer->zip }}</a></td>
				<td>{{ $flyer->street }}</td>
				<td>
				
				</td>	
				<!-- <form action="/flyers" method="DELETE">
				    <input type="hidden" name="_method" value="PUT">
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form> -->
                <td><a href="#"><button class="btn btn-xs btn-danger">Del</button></a></td>
                </td>
			</tr>
			@endforeach
			</tbody>	

			


		</table>

	
</div>



@stop