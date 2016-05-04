<div class="container-fluid" style="margin-bottom:0px;padding-bottom:0px;">
	<br>
	<ol class="breadcrumb breadcrumb-arrow">
		<li><a href="/"><i class="fa fa-home"></i></a></li>
		@foreach ($breadcrumbs as $link => $label)
		<li><a href="{{ $link }}" class="btn btn-info">{{ $label }}</a></li>
		@endforeach
	</ol>
</div>
