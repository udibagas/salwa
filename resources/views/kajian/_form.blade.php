<div class="row">
	<div class="col-md-12">
		{!! Form::model($kajian, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('tema') ? ' has-error' : '' }}">
				<label for="tema" class="col-md-2 control-label">Tema Kajian:</label>
				<div class="col-md-10">
					{{ Form::text('tema', $kajian->tema, ['class' => 'form-control', 'placeholder' => 'Tema Kajian']) }}

					@if ($errors->has('tema'))
					<span class="help-block">
						<strong>{{ $errors->first('tema') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kajian_ustadz_id') ? ' has-error' : '' }}">
				<label for="kajian_ustadz_id" class="col-md-2 control-label">Ustadz:</label>
				<div class="col-md-10">
					{{ Form::select('ustadz_id',
						\App\Ustadz::orderBy('ustadz_name', 'ASC')->pluck('ustadz_name', 'ustadz_id'),
						$kajian->kajian_ustadz_id, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Ustadz --'
						]
					) }}

					@if ($errors->has('ustadz_id'))
						<span class="help-block">
							<strong>{{ $errors->first('ustadz_id') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('peserta') ? ' has-error' : '' }}">
				<label for="peserta" class="col-md-2 control-label">Peserta:</label>
				<div class="col-md-10">
					{{ Form::select('peserta',
						\App\Kajian::getPesertaList(),
						$kajian->peserta, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Peserta --'
						]
					) }}

					@if ($errors->has('peserta'))
						<span class="help-block">
							<strong>{{ $errors->first('peserta') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				<label for="description" class="col-md-2 control-label">Description:</label>
				<div class="col-md-10">
					{{ Form::textarea('description', $kajian->description, ['class' => 'summernote', 'placeholder' => 'Tempat Kajian', 'rows' => 4]) }}

					@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('rutin') ? ' has-error' : '' }}">
				<label for="rutin" class="col-md-2 control-label">Jenis Kajian:</label>
				<div class="col-md-10">
					{{ Form::select('rutin',
						['1' => 'Rutin', '0' => 'Tematik'],
						$kajian->rutin, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Jenis Kajian --'
						]
					) }}

					@if ($errors->has('rutin'))
						<span class="help-block">
							<strong>{{ $errors->first('rutin') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="field-rutin">
				<div class="form-group{{ $errors->has('pekan') ? ' has-error' : '' }}">
					<label for="pekan" class="col-md-2 control-label">Pekan:</label>
					<div class="col-md-10">
						{{ Form::select('pekan[]',
							[1 => 1, 2 => 2, 3 => 3, 4 => 4],
							$kajian->pekan, [
								'class' => 'form-control',
								'multiple' => 'multiple',
								'style' => 'height:100px;'
							]
						) }}

						@if ($errors->has('pekan'))
							<span class="help-block">
								<strong>{{ $errors->first('pekan') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('pekan') ? ' has-error' : '' }}">
					<label for="pekan" class="col-md-2 control-label">Hari:</label>
					<div class="col-md-10">
						{{ Form::select('hari',
							\App\Kajian::getDay(),
							$kajian->hari, [
								'class' => 'form-control',
								'multiple' => 'multiple',
								'style' => 'height:160px;'
							]
						) }}

						@if ($errors->has('hari'))
							<span class="help-block">
								<strong>{{ $errors->first('hari') }}</strong>
							</span>
						@endif
					</div>
				</div>
			</div>

			<div class="form-group{{ $errors->has('waktu') ? ' has-error' : '' }}">
				<label for="kajian_dates" class="col-md-2 control-label">Waktu:</label>
				<div class="col-md-10">
					{{ Form::text('waktu', $kajian->waktu, ['class' => 'form-control', 'placeholder' => 'Waktu']) }}

					@if ($errors->has('waktu'))
					<span class="help-block">
						<strong>{{ $errors->first('waktu') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('lokasi_id') ? ' has-error' : '' }}">
				<label for="lokasi_id" class="col-md-2 control-label">Lokasi:</label>
				<div class="col-md-10">
					{{ Form::select('lokasi_id',
						\App\Lokasi::orderBy('nama_lokasi', 'ASC')->pluck('nama_lokasi', 'id_lokasi'),
						$kajian->lokasi_id, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Lokasi --'
						]
					) }}

					@if ($errors->has('lokasi_id'))
						<span class="help-block">
							<strong>{{ $errors->first('lokasi_id') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
				<label for="area_id" class="col-md-2 control-label">Area:</label>
				<div class="col-md-10">
					{{ Form::select('area_id',
						\App\Area::orderBy('nama_area', 'ASC')->pluck('nama_area', 'id_area'),
						$kajian->area_id, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Area --'
						]
					) }}

					@if ($errors->has('area_id'))
						<span class="help-block">
							<strong>{{ $errors->first('area_id') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
				<label for="tempat" class="col-md-2 control-label">Tempat:</label>
				<div class="col-md-10">
					{{ Form::textarea('tempat', $kajian->tempat, ['class' => 'form-control', 'placeholder' => 'Tempat Kajian', 'rows' => 4]) }}

					@if ($errors->has('tempat'))
					<span class="help-block">
						<strong>{{ $errors->first('tempat') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
				<label for="cp" class="col-md-2 control-label">PIC:</label>
				<div class="col-md-10">
					{{ Form::text('cp',
						$kajian->cp, [
							'class' => 'form-control',
							'placeholder' => 'PIC'
						]
					) }}

					@if ($errors->has('cp'))
						<span class="help-block">
							<strong>{{ $errors->first('cp') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
				<label for="img" class="col-md-2 control-label">Brosur Kajian:</label>
				<div class="col-md-10">
					<input type="file" name="img" class="form-control">

					@if ($errors->has('img'))
						<span class="help-block">
							<strong>{{ $errors->first('img') }}</strong>
						</span>
					@endif

					@if ($kajian->brosur)
					<br>
					<img src="/{{ $kajian->brosur }}" class="img-responsive" alt="" />
					@endif
				</div>
			</div>

			@if ($kajian->id)
			<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
				<label for="video" class="col-md-2 control-label">Video Kajian:</label>
				<div class="col-md-10">
					{{ Form::text('video', $kajian->video, ['class' => 'form-control', 'placeholder' => 'Video Kajian']) }}

					@if ($errors->has('video'))
					<span class="help-block">
						<strong>{{ $errors->first('video') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('audio') ? ' has-error' : '' }}">
				<label for="audio" class="col-md-2 control-label">Audio Kajian:</label>
				<div class="col-md-10">
					{{ Form::text('audio', $kajian->audio, ['class' => 'form-control', 'placeholder' => 'Audio Kajian']) }}

					@if ($errors->has('audio'))
					<span class="help-block">
						<strong>{{ $errors->first('audio') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('fawaid') ? ' has-error' : '' }}">
				<label for="fawaid" class="col-md-2 control-label">Fawaid Kajian:</label>
				<div class="col-md-10">
					{{ Form::textarea('fawaid', $kajian->fawaid, ['class' => 'summernote', 'placeholder' => 'Tempat Kajian', 'rows' => 4]) }}

					@if ($errors->has('fawaid'))
					<span class="help-block">
						<strong>{{ $errors->first('fawaid') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('transkrip') ? ' has-error' : '' }}">
				<label for="transkrip" class="col-md-2 control-label">Transkrip Kajian:</label>
				<div class="col-md-10">
					{{ Form::textarea('transkrip', $kajian->transkrip, ['class' => 'summernote', 'placeholder' => 'Tempat Kajian', 'rows' => 4]) }}

					@if ($errors->has('transkrip'))
					<span class="help-block">
						<strong>{{ $errors->first('transkrip') }}</strong>
					</span>
					@endif
				</div>
			</div>
			@endif

			<hr>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
</div>

@push('script')
	<script type="text/javascript">
		$('[name="rutin"]').change(function() {
			// alert(this.value);
			if (this.value == 0) {
				$('.field-rutin').hide();
			} else {
				$('.field-rutin').show();
			}
		});
	</script>
@endpush
