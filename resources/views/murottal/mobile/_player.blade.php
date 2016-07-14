<div class="row-post no-gutter info" style="height:55px;position:fixed;top:50px;left:10px;right:10px;z-index:998;">
	<div class="col-xs-8">
		{!! Form::open(['method' => 'GET', 'url' => '/murottal']) !!}
			{!! Form::text('search', request('search'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
		{!! Form::close() !!}
	</div>

	<div class="text-right" style="margin-top:2px;">
		<a href="#" class="btn btn-info btn-sm prev">
			<i class="fa fa-step-backward"></i>
		</a>
		<a href="#" class="btn btn-info btn-sm pause">
			<i class="fa fa-pause"></i>
		</a>
		<a href="{{ $murottals->count() ? $murottals->first()->file_mp3 : '' }}" class="btn btn-info btn-sm play">
			<i class="fa fa-play"></i>
		</a>
		<a href="#" class="btn btn-info btn-sm next">
			<i class="fa fa-step-forward"></i>
		</a>
	</div>
</div>
