<div class="row-post no-gutter">
	{!! Form::model($informasi, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		{!! Form::hidden('redirect', '/informasi/'.$informasi->informasi_id) !!}

		<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			{{ Form::text('judul', $informasi->judul, ['class' => 'form-control', 'placeholder' => 'Judul Informasi']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
			{{ Form::select('group_id',
				\App\Group::active()->informasi()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$informasi->group_id, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Kategori --'
				]
			) }}

			@if ($errors->has('group_id'))
				<span class="help-block">
					<strong>{{ $errors->first('group_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
			<input type="file" name="img" class="form-control">

			@if ($errors->has('img'))
				<span class="help-block">
					<strong>{{ $errors->first('img') }}</strong>
				</span>
			@endif

			@if ($informasi->img_gambar)
			<br>
			<img src="/{{ $informasi->img_gambar }}" class="img-responsive" alt="" />
			@endif
		</div>

		<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
			{{ Form::textarea('content', $informasi->content, ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('content'))
			<span class="help-block">
				<strong>{{ $errors->first('content') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
			<input type="file" name="file[]" class="note-image-input form-control" multiple="multiple">
			<span class="help-block">
				<strong>Tekan ctrl + click untuk memilih lebih dari 1 file pada dialog file. Hanya diperbolehkan upload file gambar, pdf, office, dan zip.</strong>
			</span>
			@if ($errors->has('file'))
				<span class="help-block">
					<strong>{{ $errors->first('file') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group">
			@if (isset($dokumens) && $dokumens->count())
			<ul class="list-group">
				@foreach ($dokumens as $d)
				<li class="list-group-item">
					<a href="/{{ $d->file_upload }}" target="_blank">
						<i class="fa fa-download"></i>
						{{ str_replace('uploads/dirfile_upload/', '' ,$d->file_upload) }}
					</a>
					<a href="/informasi/delete-file/{{ $d->file_id }}" class="pull-right delete"><i class="fa fa-remove"></i></a>
				</li>
				@endforeach
			</ul>
			@endif

			@if(isset($images) && $images->count())
				@each('informasi._images-edit', $images, 'image')
				<div class="clearfix"> </div>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		</div>

	{!! Form::close() !!}
</div>
