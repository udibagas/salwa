<div class="container-fluid hidden-xs">
	<br>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		@foreach ($breadcrumbs as $link => $label)
		<li><a href="{{ $link }}">{{ $label }}</a></li>
		@endforeach
	</ol>
</div>
