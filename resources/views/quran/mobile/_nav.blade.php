{!! Form::open(['method' => 'GET', 'url' => '/quran', 'class' => 'form-inline']) !!}

	<div class="pull-right" style="margin-top:6px;">
		<a href="#" id="menu" class="text-white" style="font-size:18px;"><i class="glyphicon glyphicon-option-vertical"></i></a>
	</div>

	{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search', 'style' => 'max-width:272px;margin-top:-2px;']) !!}
{!! Form::close() !!}
