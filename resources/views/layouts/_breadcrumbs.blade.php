<div class="container">
	<br />
	<div class="btn-group btn-breadcrumb">
		<a href="/" class="btn btn-primary"><i class="fa fa-home"></i></a>
		@foreach ($breadcrumbs as $link => $label)
		<a href="{{ $link }}" class="btn btn-primary">{{ $label }}</a>
		@endforeach
	</div>
</div>
