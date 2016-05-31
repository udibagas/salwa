@foreach ($comments as $c)
	<div class="row">
		<div class="col-md-1">
			<div class="thumbnail">
				<img class="img-responsive user-photo" @if ($c->user->img_user) src="/{{$c->user->img_user}}" @else src="/images/nobody.png" @endif">
			</div>
		</div>

		<div class="col-md-11">
			<div class="panel panel-info panel-comment">
				<div class="panel-heading">
					<strong>{{ $c->user ? $c->user->name : '' }}</strong>
					<span class="text-muted">commented {{ $c->updated_at->diffForHumans() }}</span>
				</div>
				<div class="panel-body">
					<h4 style="margin-top:0;"><strong>{{ $c->title }}</strong></h4>
					{!! nl2br($c->content) !!}
				</div>
			</div>
		</div>
	</div>
@endforeach
