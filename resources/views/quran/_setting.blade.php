{!! Form::open() !!}
	{!! Form::select('qari', \App\Ayah::getQariList(), request('qari'), ['class' => 'form-control']) !!}
{!! Form::close() !!}
