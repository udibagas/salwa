{!! Form::open(['method' => 'GET', 'url' => '/timeline', 'class' => 'form-inline']) !!}
	<span class="pull-right">
		<a href="#" style="color:#fff;font-size:22px;" id="menu"><i class="fa fa-bars"></i></a>
	</span>
	{!! Form::text('q', request('q'), ['class' => 'form-control search-field-salwa', 'placeholder' => 'Search', 'style' => 'max-width:265px;margin-top:-2px;']) !!}
{!! Form::close() !!}
