{!! Form::open() !!}

	{!! Form::select('qari', ['misyari' => 'Misyari Rasyid', 'sudais' => 'Sudais'], request('qari'), ['class' => 'form-control', 'placeholder' => '-- Pilih Qari\'--']) !!}

{!! Form::close() !!}
