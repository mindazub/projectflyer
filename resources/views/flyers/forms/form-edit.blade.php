@inject('countries', 'App\Http\Utilities\Country')





{{ Form::model($flyer, array('method' => 'PATCH', 'route' => array('flyer_edit', $flyer->zip, $flyer->street))) }}

<div class="form-group">
    {{ Form::label('street', 'Street:') }}
    {{ Form::text('street', null, ['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('zip', 'Zip:') }}
    {{ Form::text('zip', null, ['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, ['class'=>'form-control']) }}
</div>
<br/><br/>
<div class="form-group">
{{ Form::selectYear('year', 2013, 2015, 2014, ['class' => 'field']) }}
{{ Form::selectMonth('month') }}
{{ Form::selectRange('number', 1, 31) }}
<br/><br/>
</div>

    {{ Form::submit('Save Changes') }}
<!-- <button type="submit" class="btn btn-success">Save Changes</button>
 -->
{{ Form::close() }}