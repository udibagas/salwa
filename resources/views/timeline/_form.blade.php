{!! Form::open(['method' => 'GET', 'url' => '/timeline', 'class' => 'form-inline']) !!}
	{!! Form::hidden('type', request('type')) !!}
	<span class="pull-right" style="margin-top:5px;">
		<a href="#" style="color:#fff;font-size:18px;" id="menu"><i class="glyphicon glyphicon-option-vertical"></i></a>
	</span>
	{!! Form::text('q', request('q'), ['class' => 'form-control search-field-salwa', 'placeholder' => 'Search', 'style' => 'max-width:275px;margin-top:-2px;']) !!}
{!! Form::close() !!}
