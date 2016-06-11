<a name="comment-{{$c->id}}" class="comment-number"></a>
<div class="row">
	<div class="col-md-1 hidden-xs">
		<div class="thumbnail">
			<img class="img-responsive user-photo" @if ($c->user->img_user) src="/{{$c->user->img_user}}" @else src="/images/nobody.png" @endif">
		</div>
	</div>

	<div class="col-md-11">
		<div class="panel @if ($c->approved) panel-info @else panel-danger @endif panel-comment">
			<div class="panel-heading">
				<strong>{{ $c->user ? $c->user->name : '' }}</strong>
				<span class="text-muted">commented {{ $c->updated_at->diffForHumans() }}</span>

				<div class="pull-right">
					@can('delete-comment', $c)
					{!! Form::open(['url' => '/comment/'.$c->id, 'method' => 'DELETE', 'class' => 'form-inline']) !!}
						{!! Form::hidden('redirect', url()->current()) !!}

						@if (auth()->check() && auth()->user()->isAdmin() && !$c->approved)
							<a href="/comment/{{$c->id}}/approve?redirect={{ url()->current() }}" class="btn btn-info btn-xs"><i class="fa fa-check"></i> Approve</a>
						@endif

						@can('update-comment', $c)
							<a href="/comment/{{$c->id}}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						@endcan

						<button type="submit" name="delete" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i> Delete</button>
					{!! Form::close() !!}
					@endcan
				</div>

			</div>
			<div class="panel-body">
				<h4 style="margin-top:0;font-weight:bold;">{{ $c->title }}</h4>
				{!! $c->content !!}
			</div>
		</div>
	</div>
</div>
