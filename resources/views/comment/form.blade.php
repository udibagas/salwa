<div class="row">
	<div class="col-md-1">
		<div class="thumbnail">
			<img class="img-responsive user-photo" @if (auth()->user()->img_user) src="/{{auth()->user()->img_user}}" @else src="/images/nobody.png" @endif">
		</div>
	</div>

	<div class="col-md-11">
		<div class="panel panel-info panel-comment">
			<div class="panel-heading">
				<strong>Tulis Komentar</strong>
			</div>
			<div class="panel-body">
				{!! Form::open(['url' => 'comment', 'method' => 'POST', 'class' => 'comment']) !!}

					{!! Form::hidden('post_id', $post_id) !!}
					{!! Form::hidden('type', $type) !!}
					{!! Form::hidden('redirect', url()->current()) !!}

					<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Judul Komentar']) !!}

						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
						{!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Komentar Anda']) !!}

						@if ($errors->has('content'))
						<span class="help-block">
							<strong>{{ $errors->first('content') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-send"></i> Kirim Komentar</button>
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<br>

@push('script')
	<script type="text/javascript">
	$('form.comment').submit(function(e) {
		e.preventDefault();
		// $.post(this.action,this.serialize);
	});
	</script>
@endpush
