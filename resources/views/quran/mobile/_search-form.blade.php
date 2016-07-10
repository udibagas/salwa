<div class="row-post" style="height:55px;position:fixed;top:50px;left:10px;right:10px;background-color:#D9EDF7;">
	{!! Form::open(['method' => 'GET', 'url' => '/quran']) !!}
	{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
	{!! Form::close() !!}
</div>
