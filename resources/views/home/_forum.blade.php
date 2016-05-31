<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
	<?php $i = 0; ?>
	@foreach ($forumKategori as $f)
	<?php $i++ ?>
	<li role="presentation" class="@if ($i==1) active @endif"><a href="#{{$i}}" aria-controls="{{$i}}" role="tab" data-toggle="tab">{{$f->group_name}}</a></li>
	@endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<?php $j = 0; ?>
	@foreach ($forumKategori as $f)
	<?php $j++ ?>
	<div role="tabpanel" class="tab-pane @if ($j==1) active @endif" id="{{$j}}">
		<br />
		<ul class="list-group">
			@foreach($f->forums()->orderBy('updated', 'DESC')->limit(5)->get() as $f)
			<li class="list-group-item">
				<a href="/forum/{{$f->forum_id}}-{{str_slug($f->title)}}">
					<strong>{{$f->title}}</strong>
				</a><br />
				<i class="fa fa-user"></i> {{ $f->user ? $f->user->name : '' }}
				<i class="fa fa-clock-o"></i> {{ $f->updated->diffForHumans() }}
			</li>
			@endforeach
		</ul>
	</div>
	@endforeach

</div>
