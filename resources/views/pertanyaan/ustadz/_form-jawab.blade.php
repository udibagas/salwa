<div class="row">
	<div class="col-md-1 col-sm-2 hidden-xs">
		<div class="thumbnail">
			@if (auth()->user()->img_user)
			<img class="img-responsive" src="/{{ auth()->user()->img_user }}" />
			@else
			<img class="img-responsive" src="/images/nobody.jpg" />
			@endif
		</div>
	</div>
	<div class="col-md-11 col-sm-10">
		<div class="panel panel-info panel-comment">
			<div class="panel-heading">
				<strong>Jawab Pertanyaan</strong>
			</div>
			<div class="panel-body">
				{!! Form::model($pertanyaan, ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id.'/simpan-jawaban', 'class' => 'form-vertical', 'method' => 'PUT']) !!}

				<div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}">
					{{ Form::textarea('jawaban', $pertanyaan->jawaban, ['rows' => 10, 'class' => 'summernote', 'placeholder' => 'Tulis Jawaban']) }}

					@if ($errors->has('jawaban'))
					<span class="help-block">
						<strong>{{ $errors->first('jawaban') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group @if ($errors->has('active')) has-error @endif">
					{!! Form::select('status', ['s' => 'Tampilkan', 'h' => 'Sembunyikan'], $pertanyaan->status, ['class' => 'form-control']) !!}
					@if ($errors->has('status'))
						<span class="help-block">
							<strong>{{ $errors->first('status') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Jawaban</button>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
