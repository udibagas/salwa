<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<?php $i = 0; ?>
	@foreach ($forumKategori as $f)
	<?php $i++ ?>
	<li role="presentation" class="@if ($i==1) active @endif"><a href="#{{$i}}" aria-controls="{{$i}}" role="tab" data-toggle="tab">{{$f->group_name}}</a></li>
	@endforeach
</ul>

<br />

<!-- Tab panes -->
<div class="tab-content">
	<?php $j = 0; ?>
	@foreach ($forumKategori as $f)
	<?php $j++ ?>
	<div role="tabpanel" class="tab-pane @if ($j==1) active @endif" id="{{$j}}">
		<div class="panel panel-default">
			<ul class="list-group">
				@each('forum._item', $f->forums()->active()->orderBy('created', 'DESC')->limit(5)->get(), 'f')
			</ul>
		</div>
	</div>
	@endforeach

</div>
